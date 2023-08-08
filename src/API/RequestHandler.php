<?php

namespace Nordigen\NordigenPHP\API;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Nordigen\NordigenPHP\Http\RequestHandlerTrait;

class RequestHandler
{
    use RequestHandlerTrait;

    private string $accessToken;
    /** @var string[] */
    private array $authentication;

    public function __construct(string $baseUri, string $secretId, string $secretKey, ?ClientInterface $client)
    {
        $this->authentication = [$secretId, $secretKey];
        $this->baseUri = $baseUri;
        $this->httpClient = $this->setHttpClient($client);
    }

    /**
     * Set headers for HttpClient
     */
    public function setHttpClient(?ClientInterface $client): Client
    {
        return $client ?? new Client([
            "base_uri" => $this->baseUri,
            "headers" => [
                "accept" => "application/json",
                "User-Agent" => "Nordigen-PHP-v2",
            ],
        ]);
    }

    /**
     * Get access token
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * Set existing access token.
     */
    public function setAccessToken(string $accessToken): void
    {
        $this->accessToken = $accessToken;
        $this->httpClient = new Client([
            "base_uri" => $this->baseUri,
            "headers" => [
                "accept" => "application/json",
                "Authorization" => "Bearer {$accessToken}",
            ],
        ]);
    }

    /**
     * Get authentication.
     */
    public function getAuthentication(): array
    {
        return $this->authentication;
    }
}

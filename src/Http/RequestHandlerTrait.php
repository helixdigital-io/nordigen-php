<?php

namespace Nordigen\NordigenPHP\Http;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException;
use Nordigen\NordigenPHP\Exceptions\ExceptionHandler;
use Psr\Http\Message\ResponseInterface;

trait RequestHandlerTrait
{
    protected ClientInterface $httpClient;
    protected string $baseUri;

    public function get(string $uri, array $options = []): ResponseInterface
    {
        try {
            return $this->httpClient->get($uri, $options);
        } catch (BadResponseException $exc) {
            ExceptionHandler::handleException($exc->getResponse());
        }
    }

    public function post(string $uri, array $options = []): ResponseInterface
    {
        try {
            return $this->httpClient->post($uri, $options);
        } catch (BadResponseException $exc) {
            ExceptionHandler::handleException($exc->getResponse());
        }
    }

    public function put(string $uri, array $options = []): ResponseInterface
    {
        try {
            return $this->httpClient->put($uri, $options);
        } catch (BadResponseException $exc) {
            ExceptionHandler::handleException($exc->getResponse());
        }
    }

    public function delete(string $uri, array $options = []): ResponseInterface
    {
        try {
            return $this->httpClient->delete($uri, $options);
        } catch (BadResponseException $exc) {
            ExceptionHandler::handleException($exc->getResponse());
        }
    }
}

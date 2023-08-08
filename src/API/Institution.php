<?php

namespace Nordigen\NordigenPHP\API;

use Nordigen\NordigenPHP\API\RequestHandler;

class Institution
{

    private RequestHandler $requestHandler;

    public function __construct(RequestHandler $requestHandler)
    {
        $this->requestHandler = $requestHandler;
    }

    /**
     * Get list of all institutions.
     *
     * @return array
     */
    public function getInstitutions(): array
    {
        $response = $this->requestHandler->get('institutions/');
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Retrieve a list of Institutions by country.
     * @param string $countryCode ISO 3166 two-character country code
     *
     * @return array
     */
    public function getInstitutionsByCountry(string $countryCode): array
    {
        $response = $this->requestHandler->get('institutions/', [
            'query' => [
                'country' => $countryCode
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Retrieve information about a single Institution
     * @param string $institutionId
     *
     * @return array
     */
    public function getInstitution(string $institutionId): array
    {
        $response = $this->requestHandler->get("institutions/{$institutionId}/");
        return json_decode($response->getBody()->getContents(), true);
    }

}

<?php

namespace Nordigen\NordigenPHP\API;

readonly class Institution
{
    public function __construct(private RequestHandler $requestHandler)
    {
    }

    /**
     * Get list of all institutions.
     */
    public function getInstitutions(): array
    {
        $response = $this->requestHandler->get('institutions/');

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Retrieve a list of Institutions by country.
     * @param string $countryCode ISO 3166 two-character country code
     */
    public function getInstitutionsByCountry(string $countryCode): array
    {
        $response = $this->requestHandler->get('institutions/', [
            'query' => [
                'country' => $countryCode,
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Retrieve information about a single Institution
     */
    public function getInstitution(string $institutionId): array
    {
        $response = $this->requestHandler->get("institutions/{$institutionId}/");

        return json_decode($response->getBody()->getContents(), true);
    }
}

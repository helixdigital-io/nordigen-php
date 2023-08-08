<?php

namespace Nordigen\NordigenPHP\API;

readonly class EndUserAgreement
{
    public function __construct(private RequestHandler $requestHandler)
    {
    }

    /**
     * Retrieve all End-user Agreements for a specific End-user.
     */
    public function getEndUserAgreements(): array
    {
        $response = $this->requestHandler->get('agreements/enduser/');

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Create a new End-user Agreement.
     * @param string $institutionId The ID of the Institution.
     * @param string[] $accessScope The requested access scope. All by default. See Enums\AccessScope for possible values.
     * @param int $maxHistoricalDays Maximum number of days of transaction data to retrieve. 90 by default.
     * @param int $accessValidForDays How long access to the end-user's account will be available. 90 days by default.
     */
    public function createEndUserAgreement(
        string $institutionId,
        array  $accessScope = ['details', 'balances', 'transactions'],
        int    $maxHistoricalDays = 90,
        int    $accessValidForDays = 90
    ): array
    {
        $payload = [
            'max_historical_days' => $maxHistoricalDays,
            'access_valid_for_days' => $accessValidForDays,
            'access_scope' => $accessScope,
            'institution_id' => $institutionId,
        ];

        $response = $this->requestHandler->post('agreements/enduser/', [
            'json' => $payload,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Retrieve an End-user Agreement.
     */
    public function getEndUserAgreement(string $endUserAgreementId): array
    {
        $response = $this->requestHandler->get("agreements/enduser/{$endUserAgreementId}/");

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Delete an End-user agreement.
     */
    public function deleteEndUserAgreement(string $endUserAgreementId): void
    {
        $this->requestHandler->delete("agreements/enduser/{$endUserAgreementId}/");
    }

    /**
     * Accept an End-user agreement.
     * @param string $userAgent The End-user's user agent.
     * @param string $ipAddress The End-user's IP address.
     *
     * @return array The newly accepted End-user agreement.
     */
    public function acceptEndUserAgreement(
        string $endUserAgreementId,
        string $userAgent,
        string $ipAddress
    ): array
    {
        $payload = [
            'user_agent' => $userAgent,
            'ip_address' => $ipAddress,
        ];

        $response = $this->requestHandler->put("agreements/enduser/{$endUserAgreementId}/accept/", [
            'json' => $payload,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}

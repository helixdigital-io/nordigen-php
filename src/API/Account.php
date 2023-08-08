<?php

namespace Nordigen\NordigenPHP\API;

readonly class Account
{

    public function __construct(private RequestHandler $requestHandler, private string $accountId)
    {
    }

    /**
     * Retrieve account meta-data.
     * @return array
     */
    public function getAccountMetaData(): array
    {
        $response = $this->requestHandler->get("accounts/{$this->accountId}/");

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Retrieve account balances.
     * @return array
     */
    public function getAccountBalances(): array
    {
        $response = $this->requestHandler->get("accounts/{$this->accountId}/balances/");
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Retrieve account details.
     * @param string $accountId
     *
     * @return array
     */
    public function getAccountDetails(): array
    {
        $response = $this->requestHandler->get("accounts/{$this->accountId}/details/");
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Retrieve account transactions.
     * @param string $accountId
     *
     * @return array
     */
    public function getAccountTransactions(?string $dateFrom = null, ?string $dateTo = null): array
    {
        $params = [
            'query' => []
        ];

        if ($dateFrom) $params['query']['date_from'] = $dateFrom;
        if ($dateTo) $params['query']['date_to'] = $dateTo;

        $response = $this->requestHandler->get("accounts/{$this->accountId}/transactions/", $params);
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Retrieve premium account transactions.
     * @param ?string $country
     * @param ?string $dateFrom
     * @param ?string $dateTo
     *
     * @return array
     */
    public function getPremiumAccountTransactions(?string $country = null, ?string $dateFrom = null, ?string $dateTo = null): array
    {
        $params = [
            'query' => []
        ];

        if ($country) $params['query']['country'] = $country;
        if ($dateFrom) $params['query']['date_from'] = $dateFrom;
        if ($dateTo) $params['query']['date_to'] = $dateTo;

        $response = $this->requestHandler->get("accounts/premium/{$this->accountId}/transactions/", $params);
        return json_decode($response->getBody()->getContents(), true);
    }
}

<?php

namespace Nordigen\NordigenPHP\Enums;

enum AccessScope: string
{
    /**
     * Details scope.
     */
    case DETAILS = 'details';
    /**
     * Balance scope.
     */
    case BALANCES = 'balances';
    /**
     * Transactions scope.
     */
    case TRANSACTIONS = 'transactions';
}

<?php

namespace Nordigen\NordigenPHP\Enums;

enum AccountUsage: string
{
    /**
     * Professional account.
     */
    case ORGA = 'ORGA';
    /**
     * Private personal account.
     */
    case PRIV = 'PRIVATE';
}

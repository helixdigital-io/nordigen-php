<?php

namespace Nordigen\NordigenPHP\Enums;

enum AccountProcessingStatus: string
{
    /**
     * User has successfully authenticated themselves, and the account has been discovered.
     */
    case DISCOVERED = 'DISCOVERED';
    /**
     * An error was encountered while processing the account.
     */
    case PROCESSING = 'PROCESSING';
    /**
     * Account has been successfully processed.
     */
    case READY = 'READY';
    /**
     * An error was encountered while processing the account.
     */
    case ERROR = 'ERROR';
    /**
     * Account has been suspended (more than 10 consecutive failed attempts to access the account).
     */
    case SUSPENDED = 'SUSPENDED';
    /**
     * Access to account has expired as set in the End User Agreement.
     */
    case EXPIRED = 'EXPIRED';
}

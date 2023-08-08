<?php

namespace Nordigen\NordigenPHP\Enums;

enum RequisitionStatus: string
{
    /**
     * Requisition has been successfully created.
     */
    case CREATED = 'CR';
    /**
     * Account has been successfully linked to requisition.
     */
    case LINKED = 'LN';
    /**
     * Requisition is suspended due to numerous consecutive errors that happened while accessing its accounts.
     */
    case SUSPENDED = 'SU';
    /**
     * End-user is giving consent at Nordigen's consent screen.
     */
    case GIVING_CONSENT = 'GC';
    /**
     * End-user is redirected to the financial institution for authentication.
     */
    case UNDERGOING_AUTHENTICATION = 'UA';
    /**
     * SSN verification has failed.
     */
    case REJECTED = 'RJ';
    /**
     * End-user is selecting accounts.
     */
    case SELECTING_ACCOUNTS = 'SA';
    /**
     * End-user is granting access to their account information.
     */
    case GRANTING_ACCESS = 'GA';
    /**
     * Access to accounts has expired as set in End User Agreement.
     */
    case EXPIRED = 'EX';
}

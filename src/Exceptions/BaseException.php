<?php

namespace Nordigen\NordigenPHP\Exceptions;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class BaseException extends Exception
{
    public function __construct(private readonly ResponseInterface $response, $message = '', $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}

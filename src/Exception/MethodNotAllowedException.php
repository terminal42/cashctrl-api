<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Exception;

use Psr\Http\Message\ResponseInterface;

class MethodNotAllowedException extends ResponseException
{
    public function __construct(ResponseInterface $response, \Throwable|null $previous = null)
    {
        parent::__construct(
            'The HTTP method (GET, POST, etc.) used is not allowed.',
            405,
            $previous,
            $response,
        );
    }
}

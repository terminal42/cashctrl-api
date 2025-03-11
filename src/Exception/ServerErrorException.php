<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Exception;

use Psr\Http\Message\ResponseInterface;

class ServerErrorException extends ResponseException
{
    public function __construct(ResponseInterface $response, \Throwable|null $previous = null)
    {
        parent::__construct(
            'Something went wrong on our end - not your fault. Please contact support.',
            $response->getStatusCode(),
            $previous,
            $response,
        );
    }
}

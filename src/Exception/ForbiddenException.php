<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Exception;

use Psr\Http\Message\ResponseInterface;

class ForbiddenException extends ResponseException
{
    public function __construct(ResponseInterface $response, \Throwable $previous = null)
    {
        parent::__construct(
            'The API key doesn\'t have permissions to perform the request.',
            403,
            $previous,
            $response
        );
    }
}

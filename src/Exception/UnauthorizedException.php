<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Exception;

use Psr\Http\Message\ResponseInterface;

class UnauthorizedException extends ResponseException
{
    public function __construct(ResponseInterface $response, \Throwable $previous = null)
    {
        parent::__construct('No valid API key provided.', 401, $previous, $response);
    }
}

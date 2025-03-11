<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Exception;

use Psr\Http\Message\ResponseInterface;

class NotFoundException extends ResponseException
{
    public function __construct(ResponseInterface $response, \Throwable|null $previous = null)
    {
        parent::__construct(
            'The requested endpoint doesn\'t exist.',
            404,
            $previous,
            $response,
        );
    }
}

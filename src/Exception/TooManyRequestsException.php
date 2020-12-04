<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Exception;

use Psr\Http\Message\ResponseInterface;

class TooManyRequestsException extends ResponseException
{
    public function __construct(ResponseInterface $response, \Throwable $previous = null)
    {
        parent::__construct(
            'Too many requests hit the API too quickly. We recommend adding delays between your requests. For more information, see our Terms of Service (https://cashctrl.com/en/about/terms).',
            429,
            $previous,
            $response
        );
    }
}

<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Exception;

class UnauthorizedException extends \RuntimeException
{
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct('No valid API key provided.', 401, $previous);
    }
}

<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Exception;

class ForbiddenException extends \RuntimeException
{
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct('The API key doesn\'t have permissions to perform the request.', 403, $previous);
    }
}

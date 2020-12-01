<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Exception;

class ServerErrorException extends \RuntimeException
{
    public function __construct(int $code = 500, \Throwable $previous = null)
    {
        parent::__construct('Something went wrong on our end - not your fault. Please contact support.', $code, $previous);
    }
}

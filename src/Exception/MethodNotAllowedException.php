<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Exception;

class MethodNotAllowedException extends \RuntimeException
{
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct('The HTTP method (GET, POST, etc.) used is not allowed.', 405, $previous);
    }
}

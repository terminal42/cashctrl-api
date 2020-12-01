<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Exception;

class NotFoundException extends \RuntimeException
{
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct('The requested endpoint doesn\'t exist.', 404, $previous);
    }
}

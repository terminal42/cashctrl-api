<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi;

interface ApiClientInterface
{
    /**
     * @return Result|string
     */
    public function get(string $url, array $params = [], bool $throwValidationError = true);

    public function post(string $url, array $params, bool $throwValidationError = true): Result;
}

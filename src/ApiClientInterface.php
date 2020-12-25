<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi;

interface ApiClientInterface
{
    public const DATE_FORMAT = 'Y-m-d H:i:s.v';
    public const DATE_TIMEZONE = 'Europe/Zurich';

    /**
     * @return Result|string
     */
    public function get(string $url, array $params = [], bool $throwValidationError = true);

    public function post(string $url, array $params, bool $throwValidationError = true): Result;
}

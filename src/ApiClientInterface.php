<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi;

interface ApiClientInterface
{
    public function get(string $url, array $params = []): Result;

    public function post(string $url, array $params): Result;
}

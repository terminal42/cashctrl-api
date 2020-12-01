<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi;

interface ClientInterface
{
    public function get(string $url, array $params = []);

    public function post(string $url, array $params): Result;
}

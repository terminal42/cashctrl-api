<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi;

class Client implements ClientInterface
{
    private string $apiBase;
    private string $apiKey;

    public function __construct(string $subdomain, string $apiKey)
    {
        $this->apiBase = 'https://'.$subdomain.'.cashctrl.com/api/v1/';
        $this->apiKey = $apiKey;
    }

    /**
     * @return array|string|int|float|null
     */
    public function get(string $url, array $params = [])
    {
        // TODO: Implement get() method.
    }

    public function post(string $url, array $params): Result
    {
        // TODO: Implement post() method.
    }
}

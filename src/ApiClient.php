<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;

class ApiClient implements ApiClientInterface
{
    private ClientInterface $httpClient;
    private RequestFactoryInterface $requestFactory;
    private string $apiBase;
    private string $apiKey;

    public function __construct(ClientInterface $httpClient, RequestFactoryInterface $requestFactory, string $subdomain, string $apiKey)
    {
        $this->apiBase = 'https://'.$subdomain.'.cashctrl.com/api/v1/';
        $this->apiKey = $apiKey;
        $this->httpClient = $httpClient;
        $this->requestFactory = $requestFactory;
    }

    /**
     * @return array|string|int|float|null
     */
    public function get(string $url, array $params = [])
    {
        $request = $this->requestFactory
            ->createRequest('GET', $this->apiBase.$url)
            ->withHeader('Authorization', 'Basic '.$this->apiKey)
        ;

        $response = $this->httpClient->sendRequest($request);

        return $response;
    }

    public function post(string $url, array $params): Result
    {
        // TODO: Implement post() method.
    }
}

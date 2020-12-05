<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Terminal42\CashctrlApi\Exception\UnauthorizedException;
use Psr\Http\Message\ResponseInterface;
use Terminal42\CashctrlApi\Exception\ForbiddenException;
use Terminal42\CashctrlApi\Exception\NotFoundException;
use Terminal42\CashctrlApi\Exception\MethodNotAllowedException;
use Terminal42\CashctrlApi\Exception\TooManyRequestsException;
use Terminal42\CashctrlApi\Exception\ServerErrorException;
use Psr\Http\Message\StreamFactoryInterface;
use Terminal42\CashctrlApi\Exception\RuntimeException;
use Terminal42\CashctrlApi\Exception\ValidationErrorException;

class ApiClient implements ApiClientInterface
{
    private ClientInterface $httpClient;
    private RequestFactoryInterface $requestFactory;
    private StreamFactoryInterface $streamFactory;
    private string $apiBase;

    public function __construct(ClientInterface $httpClient, RequestFactoryInterface $requestFactory, StreamFactoryInterface $streamFactory, string $subdomain, string $apiKey)
    {
        $this->httpClient = $httpClient;
        $this->requestFactory = $requestFactory;
        $this->streamFactory = $streamFactory;
        $this->apiBase = 'https://'.$apiKey.'@'.$subdomain.'.cashctrl.com/api/v1/';
    }

    /**
     * @return Result|string
     */
    public function get(string $url, array $params = [], bool $throwValidationError = true)
    {
        $query = empty($params) ? '' : '?'.http_build_query($params);
        $request = $this->requestFactory->createRequest('GET', $this->apiBase.$url.$query);

        $response = $this->httpClient->sendRequest($request);

        $this->throwExceptionForStatus($response);

        $content = $response->getBody()->getContents();

        if (!$this->isJson($response)) {
            return $content;
        }

        return $this->createResult($content, $throwValidationError);
    }

    public function post(string $url, array $params, bool $throwValidationError = true): Result
    {
        $request = $this->requestFactory
            ->createRequest('POST', $this->apiBase.$url)
            ->withHeader('Content-Type', 'application/x-www-form-urlencoded')
            ->withBody($this->streamFactory->createStream(http_build_query($params)))
        ;

        $response = $this->httpClient->sendRequest($request);

        $this->throwExceptionForStatus($response);

        $content = $response->getBody()->getContents();

        if (!$this->isJson($response)) {
            throw new RuntimeException('Expected JSON response for POST request.');
        }

        return $this->createResult($content, $throwValidationError);
    }

    private function throwExceptionForStatus(ResponseInterface $response): void
    {
        $exceptions = [
            401 => UnauthorizedException::class,
            403 => ForbiddenException::class,
            404 => NotFoundException::class,
            405 => MethodNotAllowedException::class,
            429 => TooManyRequestsException::class
        ];

        $statusCode = $response->getStatusCode();

        if (200 === $statusCode) {
            return;
        }

        if (isset($exceptions[$statusCode])) {
            throw new $exceptions[$statusCode]($response);
        }

        if ($statusCode >= 500) {
            throw new ServerErrorException($response);
        }
    }

    private function isJson(ResponseInterface $response): bool
    {
        return false !== strpos(implode(';', (array) $response->getHeader('Content-Type')), 'application/json');
    }

    private function createResult(string $content, bool $throwValidationError = true): Result
    {
        $result = new Result(\json_decode($content, true, 512, JSON_THROW_ON_ERROR));

        if ($throwValidationError && !$result->isSuccessful()) {
            throw new ValidationErrorException($result);
        }

        return $result;
    }
}

<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Terminal42\CashctrlApi\Exception\ForbiddenException;
use Terminal42\CashctrlApi\Exception\InvalidArgumentException;
use Terminal42\CashctrlApi\Exception\MethodNotAllowedException;
use Terminal42\CashctrlApi\Exception\NotFoundException;
use Terminal42\CashctrlApi\Exception\RuntimeException;
use Terminal42\CashctrlApi\Exception\ServerErrorException;
use Terminal42\CashctrlApi\Exception\TooManyRequestsException;
use Terminal42\CashctrlApi\Exception\UnauthorizedException;
use Terminal42\CashctrlApi\Exception\ValidationErrorException;

class ApiClient implements ApiClientInterface
{
    private const THROTTLE_REQUESTS = 4;

    private const THROTTLE_NANOSEC = 1000000000;

    private readonly string $apiBase;

    private bool $throttled = false;

    private int $requestCount = 0;

    private int|null $lastRequest = null;

    public function __construct(
        private readonly ClientInterface $httpClient,
        private readonly RequestFactoryInterface $requestFactory,
        private readonly StreamFactoryInterface $streamFactory,
        string $subdomain,
        private readonly string $apiKey,
    ) {
        $this->apiBase = 'https://'.$subdomain.'.cashctrl.com/api/v1/';
    }

    public function get(string $url, array $params = [], bool $throwValidationError = true): Result|string
    {
        $this->throttle();

        $query = empty($params) ? '' : '?'.http_build_query($params);
        $request = $this->requestFactory
            ->createRequest('GET', $this->apiBase.$url.$query)
            ->withHeader('Authorization', 'Basic '.base64_encode($this->apiKey.':'))
        ;

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
        $this->throttle();

        $request = $this->requestFactory
            ->createRequest('POST', $this->apiBase.$url)
            ->withHeader('Content-Type', 'application/x-www-form-urlencoded')
            ->withHeader('Authorization', 'Basic '.base64_encode($this->apiKey.':'))
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

    public function enableAutoThrottle(): self
    {
        $this->throttled = true;

        return $this;
    }

    public static function parseDateTime(string $datetime): \DateTime
    {
        $result = \DateTime::createFromFormat(
            self::DATE_FORMAT,
            $datetime,
            new \DateTimeZone(self::DATE_TIMEZONE),
        );

        if (!$result instanceof \DateTime) {
            throw new InvalidArgumentException($datetime.' could not be parsed to DateTime with format "'.self::DATE_FORMAT.'"');
        }

        return $result;
    }

    private function throttle(): void
    {
        if (!$this->throttled) {
            return;
        }

        ++$this->requestCount;

        if (!$this->lastRequest) {
            $this->lastRequest = hrtime(true);

            return;
        }

        if ($this->requestCount <= self::THROTTLE_REQUESTS) {
            return;
        }

        $time = hrtime(true);
        $diff = $time - $this->lastRequest;

        if ($diff < self::THROTTLE_NANOSEC) {
            usleep(self::THROTTLE_NANOSEC / 1000);
        }

        $this->lastRequest = hrtime(true);
        $this->requestCount = 0;
    }

    private function throwExceptionForStatus(ResponseInterface $response): void
    {
        $exceptions = [
            401 => UnauthorizedException::class,
            403 => ForbiddenException::class,
            404 => NotFoundException::class,
            405 => MethodNotAllowedException::class,
            429 => TooManyRequestsException::class,
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
        return str_contains(implode(';', $response->getHeader('Content-Type')), 'application/json');
    }

    private function createResult(string $content, bool $throwValidationError = true): Result
    {
        $result = new Result(json_decode($content, true, 512, JSON_THROW_ON_ERROR));

        if ($throwValidationError && !$result->isSuccessful()) {
            throw new ValidationErrorException($result);
        }

        return $result;
    }
}

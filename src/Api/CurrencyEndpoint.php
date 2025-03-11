<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Currency;
use Terminal42\CashctrlApi\Result;

/**
 * @extends AbstractEndpoint<Currency>
 */
class CurrencyEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'currency');
    }

    public function exchangerate(string $from, string $to, \DateTimeInterface|null $date = null): Result
    {
        $params = ['from' => $from, 'to' => $to];

        if (null !== $date) {
            $params['date'] = $date->format('Y-m-d');
        }

        return $this->get('exchangerate', $params);
    }

    protected function createInstance(array $data): Currency
    {
        return Currency::create($data);
    }
}

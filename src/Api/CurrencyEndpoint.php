<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Currency;
use Terminal42\CashctrlApi\Result;
use Terminal42\CashctrlApi\Api\Filter\ListFilter;

/**
 * @method Currency read(int $id)
 * @method Currency[]|ListFilter list()
 * @method Result create(Currency $entity)
 * @method Result update(Currency $entity)
 * @method Result delete(array $ids)
 */
class CurrencyEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'currency');
    }

    public function exchangerate(string $from, string $to, \DateTimeInterface $date = null): Result
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

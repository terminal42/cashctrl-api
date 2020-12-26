<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\OrderBookentry;
use Terminal42\CashctrlApi\Result;

/**
 * @method OrderBookentry read(int $id)
 * @method Result create(OrderBookentry $entity)
 * @method Result update(OrderBookentry $entity)
 * @method Result delete(array $ids)
 */
class OrderBookentryEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'order/bookentry');
    }

    protected function createInstance(array $data): OrderBookentry
    {
        return OrderBookentry::create($data);
    }
}

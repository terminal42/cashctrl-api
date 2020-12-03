<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Order;
use Terminal42\CashctrlApi\Result;

/**
 * @method Order read(int $id)
 * @method Order[] list()
 * @method Result create(Order $entity)
 * @method Result update(Order $entity)
 * @method Result delete(array $ids)
 */
class OrderEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'order');
    }

    protected function createInstance(array $data): Order
    {
        return Order::create($data);
    }
}

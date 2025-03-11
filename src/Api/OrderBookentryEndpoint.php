<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\Api\Filter\OrderBookentryListFilter;
use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\OrderBookentry;
use Terminal42\CashctrlApi\Result;

/**
 * @method OrderBookentry|null read(int $id)
 * @method Result              create(OrderBookentry $entity)
 * @method Result              update(OrderBookentry $entity)
 * @method Result              delete(array $ids)
 */
class OrderBookentryEndpoint extends AbstractCRUDEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'order/bookentry');
    }

    public function list(int $orderId): OrderBookentryListFilter
    {
        return new OrderBookentryListFilter(
            $this->client,
            $this->urlPrefix,
            fn (array $data) => $this->createInstance($data),
            $orderId,
        );
    }

    protected function createInstance(array $data): OrderBookentry
    {
        return OrderBookentry::create($data);
    }
}

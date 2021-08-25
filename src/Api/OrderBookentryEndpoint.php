<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\Entity\OrderBookentry;
use Terminal42\CashctrlApi\Result;
use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Api\Filter\OrderBookentryListFilter;

/**
 * @method OrderBookentry read(int $id)
 * @method Result create(OrderBookentry $entity)
 * @method Result update(OrderBookentry $entity)
 * @method Result delete(array $ids)
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
            function (array $data) {
                return $this->createInstance($data);
            },
            $orderId
        );
    }

    protected function createInstance(array $data, bool $partial = false): OrderBookentry
    {
        return OrderBookentry::create($data, $partial);
    }
}

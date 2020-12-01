<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ClientInterface;
use Terminal42\CashctrlApi\Entity\OrderCategory;
use Terminal42\CashctrlApi\Result;

/**
 * @method OrderCategory read(int $id)
 * @method OrderCategory[] list()
 * @method Result create(OrderCategory $entity)
 * @method Result update(OrderCategory $entity)
 * @method Result delete(array $ids)
 */
class OrderCategoryEndpoint extends AbstractEndpoint
{
    public function __construct(ClientInterface $client)
    {
        parent::__construct($client, 'order/category');
    }

    protected function createInstance(array $data): OrderCategory
    {
        return OrderCategory::create($data);
    }
}

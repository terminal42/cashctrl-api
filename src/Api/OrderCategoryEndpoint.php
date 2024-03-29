<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\OrderCategory;
use Terminal42\CashctrlApi\Result;
use Terminal42\CashctrlApi\Api\Filter\ListFilter;

/**
 * @method OrderCategory|null read(int $id)
 * @method OrderCategory[]|ListFilter list()
 * @method Result create(OrderCategory $entity)
 * @method Result update(OrderCategory $entity)
 * @method Result delete(array $ids)
 */
class OrderCategoryEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'order/category');
    }

    protected function createInstance(array $data): OrderCategory
    {
        return OrderCategory::create($data);
    }
}

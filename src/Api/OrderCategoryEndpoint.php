<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\OrderCategory;

/**
 * @extends AbstractEndpoint<OrderCategory>
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

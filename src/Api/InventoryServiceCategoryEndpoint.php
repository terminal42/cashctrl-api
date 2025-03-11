<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\InventoryServiceCategory;

/**
 * @extends AbstractEndpoint<InventoryServiceCategory>
 */
class InventoryServiceCategoryEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'inventory/service/category');
    }

    protected function createInstance(array $data): InventoryServiceCategory
    {
        return InventoryServiceCategory::create($data);
    }
}

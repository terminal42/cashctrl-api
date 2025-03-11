<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\Api\Filter\ListFilter;
use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\InventoryServiceCategory;
use Terminal42\CashctrlApi\Result;

/**
 * @method InventoryServiceCategory|null              read(int $id)
 * @method array<InventoryServiceCategory>|ListFilter list()
 * @method Result                                     create(InventoryServiceCategory $entity)
 * @method Result                                     update(InventoryServiceCategory $entity)
 * @method Result                                     delete(array $ids)
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

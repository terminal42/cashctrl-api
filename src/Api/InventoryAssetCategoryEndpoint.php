<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\InventoryAssetCategory;
use Terminal42\CashctrlApi\Result;
use Terminal42\CashctrlApi\Api\Filter\ListFilter;

/**
 * @method InventoryAssetCategory read(int $id)
 * @method InventoryAssetCategory[]|ListFilter list()
 * @method Result create(InventoryAssetCategory $entity)
 * @method Result update(InventoryAssetCategory $entity)
 * @method Result delete(array $ids)
 */
class InventoryAssetCategoryEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'inventory/asset/category');
    }

    protected function createInstance(array $data, bool $partial = false): InventoryAssetCategory
    {
        return InventoryAssetCategory::create($data, $partial);
    }
}

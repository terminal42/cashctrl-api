<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ClientInterface;
use Terminal42\CashctrlApi\Entity\InventoryAssetCategory;
use Terminal42\CashctrlApi\Result;

/**
 * @method InventoryAssetCategory read(int $id)
 * @method InventoryAssetCategory[] list()
 * @method Result create(InventoryAssetCategory $entity)
 * @method Result update(InventoryAssetCategory $entity)
 * @method Result delete(array $ids)
 */
class InventoryAssetCategoryEndpoint extends AbstractEndpoint
{
    public function __construct(ClientInterface $client)
    {
        parent::__construct($client, 'inventory/asset/category');
    }

    protected function createInstance(array $data): InventoryAssetCategory
    {
        return InventoryAssetCategory::create($data);
    }
}

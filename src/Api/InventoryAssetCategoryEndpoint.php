<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\InventoryAssetCategory;

/**
 * @extends AbstractEndpoint<InventoryAssetCategory>
 */
class InventoryAssetCategoryEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'inventory/asset/category');
    }

    protected function createInstance(array $data): InventoryAssetCategory
    {
        return InventoryAssetCategory::create($data);
    }
}

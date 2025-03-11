<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\InventoryStockCategory;

/**
 * @extends AbstractEndpoint<InventoryStockCategory>
 */
class InventoryStockCategoryEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'inventory/stock/category');
    }

    protected function createInstance(array $data): InventoryStockCategory
    {
        return InventoryStockCategory::create($data);
    }
}

<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\InventoryStock;

/**
 * @extends AbstractEndpoint<InventoryStock>
 */
class InventoryStockEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'inventory/stock');
    }

    protected function createInstance(array $data): InventoryStock
    {
        return InventoryStock::create($data);
    }
}

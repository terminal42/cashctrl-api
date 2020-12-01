<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ClientInterface;
use Terminal42\CashctrlApi\Entity\InventoryStock;
use Terminal42\CashctrlApi\Result;

/**
 * @method InventoryStock read(int $id)
 * @method InventoryStock[] list()
 * @method Result create(InventoryStock $entity)
 * @method Result update(InventoryStock $entity)
 * @method Result delete(array $ids)
 */
class InventoryStockEndpoint extends AbstractEndpoint
{
    public function __construct(ClientInterface $client)
    {
        parent::__construct($client, 'inventory/stock');
    }

    protected function createInstance(array $data): InventoryStock
    {
        return InventoryStock::create($data);
    }
}

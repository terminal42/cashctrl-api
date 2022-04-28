<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\InventoryStock;
use Terminal42\CashctrlApi\Result;
use Terminal42\CashctrlApi\Api\Filter\ListFilter;

/**
 * @method InventoryStock|null read(int $id)
 * @method InventoryStock[]|ListFilter list()
 * @method Result create(InventoryStock $entity)
 * @method Result update(InventoryStock $entity)
 * @method Result delete(array $ids)
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

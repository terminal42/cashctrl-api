<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ClientInterface;
use Terminal42\CashctrlApi\Entity\InventoryUnit;
use Terminal42\CashctrlApi\Result;

/**
 * @method InventoryUnit read(int $id)
 * @method InventoryUnit[] list()
 * @method Result create(InventoryUnit $entity)
 * @method Result update(InventoryUnit $entity)
 * @method Result delete(array $ids)
 */
class InventoryUnitEndpoint extends AbstractEndpoint
{
    public function __construct(ClientInterface $client)
    {
        parent::__construct($client, 'inventory/unit');
    }

    protected function createInstance(array $data): InventoryUnit
    {
        return InventoryUnit::create($data);
    }
}

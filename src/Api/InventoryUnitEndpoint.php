<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\InventoryUnit;
use Terminal42\CashctrlApi\Result;
use Terminal42\CashctrlApi\Api\Filter\ListFilter;

/**
 * @method InventoryUnit|null read(int $id)
 * @method InventoryUnit[]|ListFilter list()
 * @method Result create(InventoryUnit $entity)
 * @method Result update(InventoryUnit $entity)
 * @method Result delete(array $ids)
 */
class InventoryUnitEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'inventory/unit');
    }

    protected function createInstance(array $data): InventoryUnit
    {
        return InventoryUnit::create($data);
    }
}

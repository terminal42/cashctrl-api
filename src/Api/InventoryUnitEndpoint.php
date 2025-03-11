<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\InventoryUnit;

/**
 * @extends AbstractEndpoint<InventoryUnit>
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

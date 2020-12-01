<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ClientInterface;
use Terminal42\CashctrlApi\Entity\InventoryService;
use Terminal42\CashctrlApi\Result;

/**
 * @method InventoryService read(int $id)
 * @method InventoryService[] list()
 * @method Result create(InventoryService $entity)
 * @method Result update(InventoryService $entity)
 * @method Result delete(array $ids)
 */
class InventoryServiceEndpoint extends AbstractEndpoint
{
    public function __construct(ClientInterface $client)
    {
        parent::__construct($client, 'inventory/service');
    }

    protected function createInstance(array $data): InventoryService
    {
        return InventoryService::create($data);
    }
}

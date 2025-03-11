<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\InventoryService;

/**
 * @extends AbstractEndpoint<InventoryService>
 */
class InventoryServiceEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'inventory/service');
    }

    protected function createInstance(array $data): InventoryService
    {
        return InventoryService::create($data);
    }
}

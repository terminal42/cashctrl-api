<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\InventoryAsset;

/**
 * @extends AbstractEndpoint<InventoryAsset>
 */
class InventoryAssetEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'inventory/asset');
    }

    protected function createInstance(array $data): InventoryAsset
    {
        return InventoryAsset::create($data);
    }
}

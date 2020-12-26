<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\InventoryAsset;
use Terminal42\CashctrlApi\Result;
use Terminal42\CashctrlApi\Api\Filter\ListFilter;

/**
 * @method InventoryAsset read(int $id)
 * @method InventoryAsset[]|ListFilter list()
 * @method Result create(InventoryAsset $entity)
 * @method Result update(InventoryAsset $entity)
 * @method Result delete(array $ids)
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

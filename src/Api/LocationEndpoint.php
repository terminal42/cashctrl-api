<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Location;
use Terminal42\CashctrlApi\Result;
use Terminal42\CashctrlApi\Api\Filter\ListFilter;

/**
 * @method Location read(int $id)
 * @method Location[]|ListFilter list()
 * @method Result create(Location $entity)
 * @method Result update(Location $entity)
 * @method Result delete(array $ids)
 */
class LocationEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'location');
    }

    protected function createInstance(array $data): Location
    {
        return Location::create($data);
    }
}

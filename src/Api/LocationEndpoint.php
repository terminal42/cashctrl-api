<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Location;

/**
 * @extends AbstractEndpoint<Location>
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

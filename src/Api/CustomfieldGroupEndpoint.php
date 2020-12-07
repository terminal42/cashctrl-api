<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\CustomfieldGroup;
use Terminal42\CashctrlApi\Result;

/**
 * @method CustomfieldGroup read(int $id)
 * @method CustomfieldGroup[]|ListFilter list()
 * @method Result create(CustomfieldGroup $entity)
 * @method Result update(CustomfieldGroup $entity)
 * @method Result delete(array $ids)
 */
class CustomfieldGroupEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'customfield/group');
    }

    protected function createInstance(array $data): CustomfieldGroup
    {
        return CustomfieldGroup::create($data);
    }
}

<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\CustomfieldGroup;

/**
 * @extends AbstractEndpoint<CustomfieldGroup>
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

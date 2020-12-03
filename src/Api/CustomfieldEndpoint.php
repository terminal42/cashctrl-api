<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Customfield;
use Terminal42\CashctrlApi\Result;

/**
 * @method Customfield read(int $id)
 * @method Customfield[] list()
 * @method Result create(Customfield $customfield)
 * @method Result update(Customfield $customfield)
 * @method Result delete(array $ids)
 */
class CustomfieldEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'customfield');
    }

    protected function createInstance(array $data): Customfield
    {
        return Customfield::create($data);
    }
}

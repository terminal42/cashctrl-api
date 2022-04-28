<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Tax;
use Terminal42\CashctrlApi\Result;
use Terminal42\CashctrlApi\Api\Filter\ListFilter;

/**
 * @method Tax|null read(int $id)
 * @method Tax[]|ListFilter list()
 * @method Result create(Tax $entity)
 * @method Result update(Tax $entity)
 * @method Result delete(array $ids)
 */
class TaxEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'tax');
    }

    protected function createInstance(array $data): Tax
    {
        return Tax::create($data);
    }
}

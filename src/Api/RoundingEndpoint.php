<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\Api\Filter\ListFilter;
use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Rounding;
use Terminal42\CashctrlApi\Result;

/**
 * @method Rounding|null              read(int $id)
 * @method array<Rounding>|ListFilter list()
 * @method Result                     create(Rounding $entity)
 * @method Result                     update(Rounding $entity)
 * @method Result                     delete(array $ids)
 */
class RoundingEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'rounding');
    }

    protected function createInstance(array $data): Rounding
    {
        return Rounding::create($data);
    }
}

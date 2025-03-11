<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\Api\Filter\ListFilter;
use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Fiscalperiod;
use Terminal42\CashctrlApi\Result;

/**
 * @method Fiscalperiod|null              read(int $id)
 * @method array<Fiscalperiod>|ListFilter list()
 * @method Result                         create(Fiscalperiod $entity)
 * @method Result                         update(Fiscalperiod $entity)
 * @method Result                         delete(array $ids)
 */
class FiscalperiodEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'fiscalperiod');
    }

    public function switch(int $id)
    {
        return $this->get('switch.json', ['id' => $id]);
    }

    protected function createInstance(array $data): Fiscalperiod
    {
        return Fiscalperiod::create($data);
    }
}

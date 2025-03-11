<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Fiscalperiod;

/**
 * @extends AbstractEndpoint<Fiscalperiod>
 */
class FiscalperiodEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'fiscalperiod');
    }

    public function switch(int $id): void
    {
        $this->get('switch.json', ['id' => $id]);
    }

    protected function createInstance(array $data): Fiscalperiod
    {
        return Fiscalperiod::create($data);
    }
}

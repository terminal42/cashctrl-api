<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Journal;
use Terminal42\CashctrlApi\Result;
use Terminal42\CashctrlApi\Api\Filter\ListFilter;

/**
 * @method Journal read(int $id)
 * @method Journal[]|ListFilter list()
 * @method Result create(Journal $entity)
 * @method Result update(Journal $entity)
 * @method Result delete(array $ids)
 */
class JournalEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'journal');
    }

    protected function createInstance(array $data): Journal
    {
        return Journal::create($data);
    }
}

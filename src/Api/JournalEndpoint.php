<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ClientInterface;
use Terminal42\CashctrlApi\Entity\Journal;
use Terminal42\CashctrlApi\Result;

/**
 * @method JournalEndpoint read(int $id)
 * @method JournalEndpoint[] list()
 * @method Result create(JournalEndpoint $entity)
 * @method Result update(JournalEndpoint $entity)
 * @method Result delete(array $ids)
 */
class JournalEndpoint extends AbstractEndpoint
{
    public function __construct(ClientInterface $client)
    {
        parent::__construct($client, 'journal');
    }

    protected function createInstance(array $data): Journal
    {
        return Journal::create($data);
    }
}

<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Journal;

/**
 * @extends AbstractEndpoint<Journal>
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

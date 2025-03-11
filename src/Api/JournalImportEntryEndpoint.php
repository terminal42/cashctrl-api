<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\JournalImportEntry;

/**
 * @extends AbstractEndpoint<JournalImportEntry>
 */
class JournalImportEntryEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'journal/import/entry');
    }

    protected function createInstance(array $data): JournalImportEntry
    {
        return JournalImportEntry::create($data);
    }
}

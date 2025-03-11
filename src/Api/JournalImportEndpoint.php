<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\JournalImport;

/**
 * @extends AbstractEndpoint<JournalImport>
 */
class JournalImportEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'journal/import');
    }

    protected function createInstance(array $data): JournalImport
    {
        return JournalImport::create($data);
    }
}

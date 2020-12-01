<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ClientInterface;
use Terminal42\CashctrlApi\Entity\JournalImport;
use Terminal42\CashctrlApi\Result;

/**
 * @method JournalImport read(int $id)
 * @method JournalImport[] list()
 * @method Result create(JournalImport $entity)
 * @method Result update(JournalImport $entity)
 * @method Result delete(array $ids)
 */
class JournalImportEndpoint extends AbstractEndpoint
{
    public function __construct(ClientInterface $client)
    {
        parent::__construct($client, 'journal/import');
    }

    protected function createInstance(array $data): JournalImport
    {
        return JournalImport::create($data);
    }
}

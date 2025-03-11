<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\Api\Filter\ListFilter;
use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\JournalImport;
use Terminal42\CashctrlApi\Result;

/**
 * @method JournalImport|null              read(int $id)
 * @method array<JournalImport>|ListFilter list()
 * @method Result                          create(JournalImport $entity)
 * @method Result                          update(JournalImport $entity)
 * @method Result                          delete(array $ids)
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

<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Result;
use Terminal42\CashctrlApi\Entity\Sequencenumber;
use Terminal42\CashctrlApi\Api\Filter\ListFilter;

/**
 * @method Sequencenumber|null read(int $id)
 * @method Sequencenumber[]|ListFilter list()
 * @method Result create(Sequencenumber $entity)
 * @method Result update(Sequencenumber $entity)
 * @method Result delete(array $ids)
 */
class SequencenumberEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'sequencenumber');
    }

    public function getById(int $id, int $categoryId = null): string
    {
        return (string) $this->get('get', ['id' => $id, 'categoryId' => $categoryId]);
    }

    public function getByType(string $type, int $categoryId = null): string
    {
        return (string) $this->get('get', ['type' => $type, 'categoryId' => $categoryId]);
    }

    protected function createInstance(array $data): Sequencenumber
    {
        return Sequencenumber::create($data);
    }
}

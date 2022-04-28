<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Person;
use Terminal42\CashctrlApi\Result;
use Terminal42\CashctrlApi\Api\Filter\PersonListFilter;

/**
 * @method Person|null read(int $id)
 * @method Result create(Person $entity)
 * @method Result update(Person $entity)
 * @method Result delete(array $ids)
 */
class PersonEndpoint extends AbstractCRUDEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'person');
    }

    /**
     * @return Person[]|PersonListFilter
     */
    public function list(): PersonListFilter
    {
        return new PersonListFilter($this->client, 'person', function (array $data) {
            return $this->createInstance($data);
        });
    }

    public function categorize(array $ids, int $target): Result
    {
        return $this->post('categorize.json', ['ids' => implode(',', $ids), 'target' => $target]);
    }

    protected function createInstance(array $data): Person
    {
        return Person::create($data);
    }
}

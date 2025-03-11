<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\Api\Filter\PersonListFilter;
use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Person;
use Terminal42\CashctrlApi\Result;

/**
 * @extends AbstractCRUDEndpoint<Person>
 */
class PersonEndpoint extends AbstractCRUDEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'person');
    }

    public function list(): PersonListFilter
    {
        return new PersonListFilter($this->client, 'person', fn (array $data) => $this->createInstance($data));
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

<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api\Filter;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Person;
use Terminal42\CashctrlApi\Exception\DomainException;

/**
 * @extends ListFilter<Person>
 */
class PersonListFilter extends ListFilter
{
    protected int|null $categoryId = null;

    protected string|null $columns = null;

    protected string|null $dir = null;

    protected int|null $limit = null;

    protected bool|null $onlyActive = null;

    protected bool|null $onlyNotes = null;

    protected bool|null $onlyWithoutCategory = null;

    protected string|null $query = null;

    protected string|null $sort = null;

    protected int|null $start = null;

    private readonly ApiClientInterface $client;

    public function __construct(ApiClientInterface $client, string $urlPrefix, \Closure $createInstance)
    {
        parent::__construct($client, $urlPrefix, $createInstance);

        $this->client = $client;
    }

    public function get(): array
    {
        if (null !== $this->columns) {
            throw new DomainException('Cannot filter by columns in person/list.json endpoint.');
        }

        return parent::get();
    }

    public function getExcel(): string
    {
        return $this->client->get('person/list.xlsx', $this->toArray());
    }

    public function getCsv(): string
    {
        return $this->client->get('person/list.csv', $this->toArray());
    }

    public function getPdf(): string
    {
        return $this->client->get('person/list.pdf', $this->toArray());
    }

    public function getVCard(): string
    {
        return $this->client->get('person/list.vcf', $this->toArray());
    }

    public function inCategory(int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * @param array<string> $columns
     */
    public function columns(array $columns): self
    {
        $this->columns = implode(',', $columns);

        return $this;
    }

    public function sortBy(string $field, string $direction = 'ASC'): self
    {
        $this->sort = $field;
        $this->dir = $direction;

        return $this;
    }

    public function search(string $text): self
    {
        $this->query = $text;

        return $this;
    }

    public function offset(int $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function limit(int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    public function onlyActive(): self
    {
        $this->onlyActive = true;

        return $this;
    }

    public function onlyNotes(): self
    {
        $this->onlyNotes = true;

        return $this;
    }

    public function onlyWithoutCategory(): self
    {
        $this->onlyWithoutCategory = true;

        return $this;
    }
}

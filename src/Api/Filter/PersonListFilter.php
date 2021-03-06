<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api\Filter;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Person;
use Terminal42\CashctrlApi\Exception\DomainException;

class PersonListFilter extends ListFilter
{
    private ApiClientInterface $client;

    protected ?int $categoryId = null;
    protected ?string $columns = null;
    protected ?string $dir = null;
    protected ?int $limit = null;
    protected ?bool $onlyActive = null;
    protected ?bool $onlyNotes = null;
    protected ?bool $onlyWithoutCategory = null;
    protected ?string $query = null;
    protected ?string $sort = null;
    protected ?int $start = null;

    public function __construct(ApiClientInterface $client, string $urlPrefix, \Closure $createInstance)
    {
        parent::__construct($client, $urlPrefix, $createInstance);

        $this->client = $client;
    }

    /**
     * @return Person[]
     */
    public function get(): array
    {
        if (null !== $this->columns) {
            throw new DomainException('Cannot filter by columns in person/list.json endpoint.');
        }

        return parent::get();
    }

    public function getExcel()
    {
        return $this->client->get('person/list.xlsx', $this->toArray());
    }

    public function getCsv()
    {
        return $this->client->get('person/list.csv', $this->toArray());
    }

    public function getPdf()
    {
        return $this->client->get('person/list.pdf', $this->toArray());
    }

    public function getVCard()
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

<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api\Filter;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Order;
use Terminal42\CashctrlApi\Enum\OrderType;
use Terminal42\CashctrlApi\Exception\DomainException;

/**
 * @extends ListFilter<Order>
 */
class OrderListFilter extends ListFilter
{
    protected int|null $categoryId = null;

    protected string|null $columns = null;

    protected string|null $dir = null;

    protected int|null $fiscalPeriodId = null;

    protected int|null $limit = null;

    protected bool|null $onlyNotes = null;

    protected bool|null $onlyOpen = null;

    protected bool|null $onlyOverdue = null;

    protected string|null $query = null;

    protected string|null $sort = null;

    protected int|null $start = null;

    protected int|null $statusId = null;

    protected OrderType|null $type = null;

    private readonly ApiClientInterface $client;

    public function __construct(ApiClientInterface $client, string $urlPrefix, \Closure $createInstance)
    {
        parent::__construct($client, $urlPrefix, $createInstance);

        $this->client = $client;
    }

    public function get(): array
    {
        if (null !== $this->columns) {
            throw new DomainException('Cannot filter by columns in order/list.json endpoint.');
        }

        return parent::get();
    }

    public function getExcel(): string
    {
        return $this->client->get('order/list.xlsx', $this->toArray());
    }

    public function getCsv(): string
    {
        return $this->client->get('order/list.csv', $this->toArray());
    }

    public function getPdf(): string
    {
        return $this->client->get('order/list.pdf', $this->toArray());
    }

    public function getVCard(): string
    {
        return $this->client->get('order/list.vcf', $this->toArray());
    }

    public function inCategory(int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function inFiscalPeriod(int $fiscalPeriodId): self
    {
        $this->fiscalPeriodId = $fiscalPeriodId;

        return $this;
    }

    public function withStatus(int $statusId): self
    {
        $this->statusId = $statusId;

        return $this;
    }

    public function ofType(OrderType $type): self
    {
        $this->type = $type;

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

    public function onlyNotes(): self
    {
        $this->onlyNotes = true;

        return $this;
    }

    public function onlyOpen(): self
    {
        $this->onlyOpen = true;

        return $this;
    }

    public function onlyOverdue(): self
    {
        $this->onlyOverdue = true;

        return $this;
    }
}

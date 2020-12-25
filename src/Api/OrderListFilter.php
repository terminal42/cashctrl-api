<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Exception\DomainException;
use Terminal42\CashctrlApi\Entity\Order;

class OrderListFilter extends ListFilter
{
    public const TYPE_SALES = 'SALES';
    public const TYPE_PURCHASE = 'PURCHASE';

    private ApiClientInterface $client;

    protected ?int $categoryId = null;
    protected ?string $columns = null;
    protected ?string $dir = null;
    protected ?int $fiscalPeriodId = null;
    protected ?int $limit = null;
    protected ?bool $onlyNotes = null;
    protected ?bool $onlyOpen = null;
    protected ?bool $onlyOverdue = null;
    protected ?string $query = null;
    protected ?string $sort = null;
    protected ?int $start = null;
    protected ?int $statusId = null;
    protected ?string $type = null;

    public function __construct(ApiClientInterface $client, string $urlPrefix, \Closure $createInstance)
    {
        parent::__construct($client, $urlPrefix, $createInstance);

        $this->client = $client;
    }

    /**
     * @return Order[]
     */
    public function get(): array
    {
        if (null !== $this->columns) {
            throw new DomainException('Cannot filter by columns in order/list.json endpoint.');
        }

        return parent::get();
    }

    public function getExcel()
    {
        return $this->client->get('order/list.xlsx', $this->toArray());
    }

    public function getCsv()
    {
        return $this->client->get('order/list.csv', $this->toArray());
    }

    public function getPdf()
    {
        return $this->client->get('order/list.pdf', $this->toArray());
    }

    public function getVCard()
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

    public function ofType(string $type): self
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

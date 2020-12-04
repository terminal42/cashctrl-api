<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

class Sequencenumber extends AbstractEntity
{
    public const TYPE_INVENTORY_STOCK = 'INVENTORY_STOCK';
    public const TYPE_INVENTORY_SERVICE = 'INVENTORY_SERVICE';
    public const TYPE_INVENTORY_ASSET = 'INVENTORY_ASSET';
    public const TYPE_JOURNAL = 'JOURNAL';
    public const TYPE_ORDER = 'ORDER';
    public const TYPE_PERSON = 'PERSON';
    public const TYPE_SALES_INVOICE = 'SALES_INVOICE';

    protected string $type;
    protected ?int $categoryId;

    public function __construct(string $type, int $id = null)
    {
        parent::__construct($id);

        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function setCategoryId(?int $categoryId): self
    {
        $this->categoryId = $categoryId;
        return $this;
    }
}

<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

class Account extends AbstractEntity
{
    protected int $categoryId;

    protected string $name;

    protected string $number;

    protected int|null $currencyId = null;

    protected bool|null $isInactive = null;

    protected string|null $notes = null;

    protected float|null $targetMax = null;

    protected float|null $targetMin = null;

    protected int|null $taxId = null;

    public function __construct(int $categoryId, string $name, string $number, int|null $id = null)
    {
        parent::__construct($id);

        $this->categoryId = $categoryId;
        $this->name = $name;
        $this->number = $number;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function setCategoryId(int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getCurrencyId(): int|null
    {
        return $this->currencyId;
    }

    public function setCurrencyId(int|null $currencyId): self
    {
        $this->currencyId = $currencyId;

        return $this;
    }

    public function getIsInactive(): bool|null
    {
        return $this->isInactive;
    }

    public function setIsInactive(bool|null $isInactive): self
    {
        $this->isInactive = $isInactive;

        return $this;
    }

    public function getNotes(): string|null
    {
        return $this->notes;
    }

    public function setNotes(string|null $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getTargetMax(): float|null
    {
        return $this->targetMax;
    }

    public function setTargetMax(float|null $targetMax): self
    {
        $this->targetMax = $targetMax;

        return $this;
    }

    public function getTargetMin(): float|null
    {
        return $this->targetMin;
    }

    public function setTargetMin(float|null $targetMin): self
    {
        $this->targetMin = $targetMin;

        return $this;
    }

    public function getTaxId(): int|null
    {
        return $this->taxId;
    }

    public function setTaxId(int|null $taxId): self
    {
        $this->taxId = $taxId;

        return $this;
    }
}

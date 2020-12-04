<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

class Account extends AbstractEntity
{
    protected int $categoryId;
    protected string $name;
    protected string $number;
    protected ?int $currencyId;
    protected ?bool $isInactive;
    protected ?string $notes;
    protected ?float $targetMax;
    protected ?float $targetMin;
    protected ?int $taxId;

    public function __construct(int $categoryId, string $name, string $number, int $id = null)
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

    public function getCurrencyId(): ?int
    {
        return $this->currencyId;
    }

    public function setCurrencyId(?int $currencyId): self
    {
        $this->currencyId = $currencyId;
        return $this;
    }

    public function getIsInactive(): ?bool
    {
        return $this->isInactive;
    }

    public function setIsInactive(?bool $isInactive): self
    {
        $this->isInactive = $isInactive;
        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;
        return $this;
    }

    public function getTargetMax(): ?float
    {
        return $this->targetMax;
    }

    public function setTargetMax(?float $targetMax): self
    {
        $this->targetMax = $targetMax;
        return $this;
    }

    public function getTargetMin(): ?float
    {
        return $this->targetMin;
    }

    public function setTargetMin(?float $targetMin): self
    {
        $this->targetMin = $targetMin;
        return $this;
    }

    public function getTaxId(): ?int
    {
        return $this->taxId;
    }

    public function setTaxId(?int $taxId): self
    {
        $this->taxId = $taxId;
        return $this;
    }
}

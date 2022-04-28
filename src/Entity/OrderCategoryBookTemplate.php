<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

class OrderCategoryBookTemplate implements PropertiesInterface
{
    use PropertiesTrait;

    protected int $accountId;
    protected string $name;
    protected ?bool $isAllowTax;
    protected ?int $taxId;

    public function __construct(int $accountId, string $name)
    {
        $this->accountId = $accountId;
        $this->name = $name;
    }

    public function getAccountId(): int
    {
        return $this->accountId;
    }

    public function setAccountId(int $accountId): self
    {
        $this->accountId = $accountId;
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

    public function getIsAllowTax(): ?bool
    {
        return $this->isAllowTax;
    }

    public function setIsAllowTax(?bool $isAllowTax): self
    {
        $this->isAllowTax = $isAllowTax;
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

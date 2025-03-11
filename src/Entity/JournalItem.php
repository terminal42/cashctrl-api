<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

class JournalItem implements PropertiesInterface
{
    use PropertiesTrait;

    protected int $accountId;

    protected string|null $associateId = null;

    protected float|string $credit;

    protected float|string $debit;

    protected string|null $description = null;

    protected int|null $taxId = null;

    public function __construct(int $accountId, string|null $description = null)
    {
        $this->accountId = $accountId;
        $this->description = $description;
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

    public function getAssociateId(): string|null
    {
        return $this->associateId;
    }

    public function setAssociateId(string|null $associateId): self
    {
        $this->associateId = $associateId;

        return $this;
    }

    public function getCredit(): float|string|null
    {
        return $this->credit;
    }

    public function setCredit(float|string|null $credit): self
    {
        $this->credit = $credit;

        return $this;
    }

    public function getDebit(): float|string|null
    {
        return $this->debit;
    }

    public function setDebit(float|string|null $debit): self
    {
        $this->debit = $debit;

        return $this;
    }

    public function getDescription(): string|null
    {
        return $this->description;
    }

    public function setDescription(string|null $description): self
    {
        $this->description = $description;

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

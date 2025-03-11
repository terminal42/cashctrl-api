<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

class JournalItem implements PropertiesInterface
{
    use PropertiesTrait;

    protected int $accountId;
    protected ?string $associateId = null;
    protected $credit = null;
    protected $debit = null;
    protected ?string $description = null;
    protected ?int $taxId = null;

    public function __construct(int $accountId, ?string $description = null)
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

    public function getAssociateId(): ?string
    {
        return $this->associateId;
    }

    public function setAssociateId(?string $associateId): self
    {
        $this->associateId = $associateId;
        return $this;
    }

    /**
     * @return float|string|null
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * @param float|string|null $credit
     */
    public function setCredit($credit): self
    {
        $this->credit = $credit;
        return $this;
    }

    /**
     * @return float|string|null
     */
    public function getDebit()
    {
        return $this->debit;
    }

    /**
     * @param float|string|null $debit
     */
    public function setDebit($debit): self
    {
        $this->debit = $debit;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
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

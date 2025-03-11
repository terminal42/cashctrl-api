<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

/**
 * @property string   $created
 * @property string   $createdBy
 * @property string   $lastUpdated
 * @property string   $lastUpdatedBy
 * @property int|null $debitId
 * @property int|null $creditId
 * @property int|null $importEntryId
 * @property string   $type
 * @property string   $name
 * @property string   $debitName
 * @property string   $creditName
 * @property float    $defaultCurrencyAmount
 * @property float    $netAmount
 * @property float    $taxAmount
 * @property bool     $isAllowTax
 */
class OrderBookentry extends AbstractEntity
{
    protected int $accountId;

    protected float|null $amount = null;

    protected int $orderId;

    protected int|null $currencyId = null;

    protected float|null $currencyRate = null;

    protected \DateTimeInterface|null $date = null;

    protected string|null $description = null;

    protected string|null $reference = null;

    protected int|null $taxId = null;

    protected int|null $templateId = null;

    public function __construct(int $accountId, int $orderId, int|null $id = null)
    {
        parent::__construct($id);

        $this->accountId = $accountId;
        $this->orderId = $orderId;
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

    public function getAmount(): float|null
    {
        return $this->amount;
    }

    public function setAmount(float|null $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): self
    {
        $this->orderId = $orderId;

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

    public function getCurrencyRate(): float|null
    {
        return $this->currencyRate;
    }

    public function setCurrencyRate(float|null $currencyRate): self
    {
        $this->currencyRate = $currencyRate;

        return $this;
    }

    public function getDate(): \DateTimeInterface|null
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface|null $date): self
    {
        $this->date = $date;

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

    public function getReference(): string|null
    {
        return $this->reference;
    }

    public function setReference(string|null $reference): self
    {
        $this->reference = $reference;

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

    public function getTemplateId(): int|null
    {
        return $this->templateId;
    }

    public function setTemplateId(int|null $templateId): self
    {
        $this->templateId = $templateId;

        return $this;
    }
}

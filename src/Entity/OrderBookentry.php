<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

/**
 * @property-read string $created
 * @property-read string $createdBy
 * @property-read string $lastUpdated
 * @property-read string $lastUpdatedBy
 * @property-read int|null $debitId
 * @property-read int|null $creditId
 * @property-read int|null $importEntryId
 * @property-read string $type
 * @property-read string $name
 * @property-read string $debitName
 * @property-read string $creditName
 * @property-read float $defaultCurrencyAmount
 * @property-read float $netAmount
 * @property-read float $taxAmount
 * @property-read bool $isAllowTax
 */
class OrderBookentry extends AbstractEntity
{
    protected int $accountId;
    protected ?float $amount = null;
    protected int $orderId;
    protected ?int $currencyId = null;
    protected ?float $currencyRate = null;
    protected ?\DateTimeInterface $date = null;
    protected ?string $description = null;
    protected ?string $reference = null;
    protected ?int $taxId = null;
    protected ?int $templateId = null;

    public function __construct(int $accountId, int $orderId, int $id = null)
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

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(?float $amount): self
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

    public function getCurrencyId(): ?int
    {
        return $this->currencyId;
    }

    public function setCurrencyId(?int $currencyId): self
    {
        $this->currencyId = $currencyId;
        return $this;
    }

    public function getCurrencyRate(): ?float
    {
        return $this->currencyRate;
    }

    public function setCurrencyRate(?float $currencyRate): self
    {
        $this->currencyRate = $currencyRate;
        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;
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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;
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

    public function getTemplateId(): ?int
    {
        return $this->templateId;
    }

    public function setTemplateId(?int $templateId): self
    {
        $this->templateId = $templateId;
        return $this;
    }
}

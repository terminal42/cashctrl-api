<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

/**
 * @property-read string      $id
 * @property-read string      $created
 * @property-read string      $createdBy
 * @property-read string      $lastUpdated
 * @property-read string      $lastUpdatedBy
 * @property-read int         $orderId
 * @property-read string|null $unitName
 * @property-read array       $attachments
 * @property-read array       $allocations
 * @property-read int         $pos
 * @property-read string|null $taxName
 * @property-read             $discountInherited
 * @property-read             $discountEffective
 * @property-read float       $netTotal
 * @property-read float       $defaultCurrencyNetTotal
 * @property-read float       $defaultCurrencyGrossTotal
 * @property-read float       $defaultCurrencyUnitPrice
 * @property-read float       $netUnitPrice
 * @property-read float       $defaultCurrencyNetUnitPrice
 * @property-read float       $taxRate
 * @property-read string      $taxCalcType
 * @property-read float       $grossTotal
 * @property-read float       $taxAmount
 * @property-read float       $taxTotal
 * @property-read bool        $isInventoryArticle
 */
class OrderItem implements PropertiesInterface
{
    use PropertiesTrait;

    public const TYPE_ARTICLE = 'ARTICLE';
    public const TYPE_TEXT = 'TEXT';
    public const TYPE_PAGEBREAK = 'PAGEBREAK';
    public const TYPE_SUBTOTAL = 'SUBTOTAL';

    protected int $accountId;
    protected string $name;
    protected float $unitPrice;
    protected ?string $articleNr = null;
    protected ?string $description = null;
    protected ?float $discountPercentage = null;
    protected ?int $inventoryId = null;
    protected ?int $quantity = null;
    protected ?int $taxId = null;
    protected ?string $type = null;
    protected ?int $unitId = null;

    public function __construct(int $accountId, string $name, float $unitPrice)
    {
        $this->accountId = $accountId;
        $this->name = $name;
        $this->unitPrice = $unitPrice;
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

    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(float $unitPrice): self
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    public function getArticleNr(): ?string
    {
        return $this->articleNr;
    }

    public function setArticleNr(?string $articleNr): self
    {
        $this->articleNr = $articleNr;
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

    public function getDiscountPercentage(): ?float
    {
        return $this->discountPercentage;
    }

    public function setDiscountPercentage(?float $discountPercentage): self
    {
        $this->discountPercentage = $discountPercentage;
        return $this;
    }

    public function getInventoryId(): ?int
    {
        return $this->inventoryId;
    }

    public function setInventoryId(?int $inventoryId): self
    {
        $this->inventoryId = $inventoryId;
        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getUnitId(): ?int
    {
        return $this->unitId;
    }

    public function setUnitId(?int $unitId): self
    {
        $this->unitId = $unitId;
        return $this;
    }
}

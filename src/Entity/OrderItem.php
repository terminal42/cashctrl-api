<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

/**
 * @property string      $id
 * @property string      $created
 * @property string      $createdBy
 * @property string      $lastUpdated
 * @property string      $lastUpdatedBy
 * @property int         $orderId
 * @property string|null $unitName
 * @property array       $attachments
 * @property array       $allocations
 * @property int         $pos
 * @property string|null $taxName
 * @property mixed       $discountInherited
 * @property mixed       $discountEffective
 * @property float       $netTotal
 * @property float       $defaultCurrencyNetTotal
 * @property float       $defaultCurrencyGrossTotal
 * @property float       $defaultCurrencyUnitPrice
 * @property float       $netUnitPrice
 * @property float       $defaultCurrencyNetUnitPrice
 * @property float       $taxRate
 * @property string      $taxCalcType
 * @property float       $grossTotal
 * @property float       $taxAmount
 * @property float       $taxTotal
 * @property bool        $isInventoryArticle
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

    protected string|null $articleNr = null;

    protected string|null $description = null;

    protected float|null $discountPercentage = null;

    protected int|null $inventoryId = null;

    protected int|null $quantity = null;

    protected int|null $taxId = null;

    protected string|null $type = null;

    protected int|null $unitId = null;

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

    public function getArticleNr(): string|null
    {
        return $this->articleNr;
    }

    public function setArticleNr(string|null $articleNr): self
    {
        $this->articleNr = $articleNr;

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

    public function getDiscountPercentage(): float|null
    {
        return $this->discountPercentage;
    }

    public function setDiscountPercentage(float|null $discountPercentage): self
    {
        $this->discountPercentage = $discountPercentage;

        return $this;
    }

    public function getInventoryId(): int|null
    {
        return $this->inventoryId;
    }

    public function setInventoryId(int|null $inventoryId): self
    {
        $this->inventoryId = $inventoryId;

        return $this;
    }

    public function getQuantity(): int|null
    {
        return $this->quantity;
    }

    public function setQuantity(int|null $quantity): self
    {
        $this->quantity = $quantity;

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

    public function getType(): string|null
    {
        return $this->type;
    }

    public function setType(string|null $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getUnitId(): int|null
    {
        return $this->unitId;
    }

    public function setUnitId(int|null $unitId): self
    {
        $this->unitId = $unitId;

        return $this;
    }
}

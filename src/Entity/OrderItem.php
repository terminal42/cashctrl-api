<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

class OrderItem implements \JsonSerializable
{
    public const TYPE_ARTICLE = 'ARTICLE';
    public const TYPE_TEXT = 'TEXT';
    public const TYPE_PAGEBREAK = 'PAGEBREAK';
    public const TYPE_SUBTOTAL = 'SUBTOTAL';

    public int $accountId;
    public string $name;
    public float $unitPrice;
    public ?string $articleNr = null;
    public ?string $description = null;
    public ?float $discountPercentage = null;
    public ?int $inventoryId = null;
    public ?int $quantity = null;
    public ?int $taxId = null;
    public ?string $type = null;
    public ?int $unitId = null;

    public function __construct(int $accountId, string $name, float $unitPrice)
    {
        $this->accountId = $accountId;
        $this->name = $name;
        $this->unitPrice = $unitPrice;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'accountId' => $this->accountId,
            'name' => $this->name,
            'unitPrice' => $this->unitPrice,
            'articleNr' => $this->articleNr,
            'description' => $this->description,
            'discountPercentage' => $this->discountPercentage,
            'inventoryId' => $this->inventoryId,
            'quantity' => $this->quantity,
            'taxId' => $this->taxId,
            'type' => $this->type,
            'unitId' => $this->unitId,
        ], static fn ($v) => null !== $v);
    }
}

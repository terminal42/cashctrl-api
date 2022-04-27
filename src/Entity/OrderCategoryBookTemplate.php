<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

class OrderCategoryBookTemplate implements \JsonSerializable
{
    public int $accountId;
    public string $name;
    public ?bool $isAllowTax;
    public ?int $taxId;

    public function __construct(int $accountId, string $name)
    {
        $this->accountId = $accountId;
        $this->name = $name;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'accountId' => $this->accountId,
            'name' => $this->name,
            'isAllowTax' => $this->isAllowTax,
            'taxId' => $this->taxId,
        ], static fn ($v) => null !== $v);
    }
}

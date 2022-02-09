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
    protected float $amount;
    protected int $orderId;
    protected ?int $currencyId = null;
    protected ?float $currencyRate = null;
    protected ?\DateTimeInterface $date = null;
    protected ?string $description = null;
    protected ?string $reference = null;
    protected ?int $taxId = null;
    protected ?int $templateId = null;
}

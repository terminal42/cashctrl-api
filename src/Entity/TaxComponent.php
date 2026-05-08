<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

use Terminal42\CashctrlApi\Enum\TaxApplyRule;
use Terminal42\CashctrlApi\Enum\TaxCalcType;

/**
 * @property int  $id
 * @property int  $pos
 * @property bool $isInputTax
 */
class TaxComponent implements PropertiesInterface
{
    use PropertiesTrait;

    protected int $accountId;

    protected TaxApplyRule $applyRule;

    protected TaxCalcType $calcType;

    protected string|null $code = null;

    public function __construct(int $accountId, TaxApplyRule $applyRule, TaxCalcType $calcType)
    {
        $this->accountId = $accountId;
        $this->applyRule = $applyRule;
        $this->calcType = $calcType;
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

    public function getApplyRule(): TaxApplyRule
    {
        return $this->applyRule;
    }

    public function setApplyRule(TaxApplyRule $applyRule): self
    {
        $this->applyRule = $applyRule;

        return $this;
    }

    public function getCalcType(): TaxCalcType
    {
        return $this->calcType;
    }

    public function setCalcType(TaxCalcType $calcType): self
    {
        $this->calcType = $calcType;

        return $this;
    }

    public function getCode(): string|null
    {
        return $this->code;
    }

    public function setCode(string|null $code): self
    {
        $this->code = $code;

        return $this;
    }
}

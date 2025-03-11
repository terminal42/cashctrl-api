<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

class Tax extends AbstractEntity
{
    public const CALC_NET = 'NET';

    public const CALC_GROSS = 'GROSS';

    protected int $accountId;

    protected string $name;

    protected float $percentage;

    protected string|null $calcType = null;

    protected string|null $documentName = null;

    protected bool|null $isInactive = null;

    protected float|null $percentageFlat = null;

    public function __construct(int $accountId, string $name, float $percentage, int|null $id = null)
    {
        parent::__construct($id);

        $this->accountId = $accountId;
        $this->name = $name;
        $this->percentage = $percentage;
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

    public function getPercentage(): float
    {
        return $this->percentage;
    }

    public function setPercentage(float $percentage): self
    {
        $this->percentage = $percentage;

        return $this;
    }

    public function getCalcType(): string|null
    {
        return $this->calcType;
    }

    public function setCalcType(string|null $calcType): self
    {
        $this->calcType = $calcType;

        return $this;
    }

    public function getDocumentName(): string|null
    {
        return $this->documentName;
    }

    public function setDocumentName(string|null $documentName): self
    {
        $this->documentName = $documentName;

        return $this;
    }

    public function getIsInactive(): bool|null
    {
        return $this->isInactive;
    }

    public function setIsInactive(bool|null $isInactive): self
    {
        $this->isInactive = $isInactive;

        return $this;
    }

    public function getPercentageFlat(): float|null
    {
        return $this->percentageFlat;
    }

    public function setPercentageFlat(float|null $percentageFlat): self
    {
        $this->percentageFlat = $percentageFlat;

        return $this;
    }
}

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
    protected ?string $calcType = null;
    protected ?string $documentName = null;
    protected ?bool $isInactive = null;
    protected ?float $percentageFlat = null;

    public function __construct(int $accountId, string $name, float $percentage, int $id = null)
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

    public function setAccountId(int $accountId): Tax
    {
        $this->accountId = $accountId;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Tax
    {
        $this->name = $name;
        return $this;
    }

    public function getPercentage(): float
    {
        return $this->percentage;
    }

    public function setPercentage(float $percentage): Tax
    {
        $this->percentage = $percentage;
        return $this;
    }

    public function getCalcType(): ?string
    {
        return $this->calcType;
    }

    public function setCalcType(?string $calcType): Tax
    {
        $this->calcType = $calcType;
        return $this;
    }

    public function getDocumentName(): ?string
    {
        return $this->documentName;
    }

    public function setDocumentName(?string $documentName): Tax
    {
        $this->documentName = $documentName;
        return $this;
    }

    public function getIsInactive(): ?bool
    {
        return $this->isInactive;
    }

    public function setIsInactive(?bool $isInactive): Tax
    {
        $this->isInactive = $isInactive;
        return $this;
    }

    public function getPercentageFlat(): ?float
    {
        return $this->percentageFlat;
    }

    public function setPercentageFlat(?float $percentageFlat): Tax
    {
        $this->percentageFlat = $percentageFlat;
        return $this;
    }
}

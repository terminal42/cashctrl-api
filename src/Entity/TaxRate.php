<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

/**
 * @property int $id
 */
class TaxRate implements PropertiesInterface
{
    use PropertiesTrait;

    protected float $percentage;

    protected \DateTimeInterface|null $dateValid = null;

    protected float|null $percentageFlat = null;

    public function __construct(float $percentage)
    {
        $this->percentage = $percentage;
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

    public function getDateValid(): \DateTimeInterface|null
    {
        return $this->dateValid;
    }

    public function setDateValid(\DateTimeInterface|null $dateValid): self
    {
        $this->dateValid = $dateValid;

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

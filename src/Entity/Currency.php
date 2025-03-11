<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

class Currency extends AbstractEntity
{
    protected string $code;

    protected string|null $description = null;

    protected bool|null $isDefault = null;

    protected float|null $rate = null;

    public function __construct(string $code, int|null $id = null)
    {
        parent::__construct($id);

        $this->code = $code;
    }

    public function getCode(): string
    {
        return $this->code;
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

    public function isDefault(): bool|null
    {
        return $this->isDefault;
    }

    public function setIsDefault(bool|null $isDefault): self
    {
        $this->isDefault = $isDefault;

        return $this;
    }

    public function getRate(): float|null
    {
        return $this->rate;
    }

    public function setRate(float|null $rate): self
    {
        $this->rate = $rate;

        return $this;
    }
}

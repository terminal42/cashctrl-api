<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

class Currency extends AbstractEntity
{
    protected string $code;
    protected ?string $description = null;
    protected ?bool $isDefault = null;
    protected ?float $rate = null;

    public function __construct(string $code, int $id = null)
    {
        parent::__construct($id);

        $this->code = $code;
    }

    public function getCode(): string
    {
        return $this->code;
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

    public function isDefault(): ?bool
    {
        return $this->isDefault;
    }

    public function setIsDefault(?bool $isDefault): self
    {
        $this->isDefault = $isDefault;
        return $this;
    }

    public function getRate(): ?float
    {
        return $this->rate;
    }

    public function setRate(?float $rate): self
    {
        $this->rate = $rate;
        return $this;
    }
}

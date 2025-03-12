<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

use Terminal42\CashctrlApi\Enum\FiscalperiodType;

class Fiscalperiod extends AbstractEntity
{
    protected string|null $name = null;

    protected \DateTimeInterface|null $start = null;

    protected \DateTimeInterface|null $end = null;

    protected FiscalperiodType|null $type = null;

    protected bool|null $isCustom = null;

    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(string|null $name): self
    {
        if (\strlen((string) $name) > 30) {
            throw new \LogicException('Fiscalperiod name cannot be longer than 30 characters.');
        }

        $this->name = $name;

        return $this;
    }

    public function getStart(): \DateTimeInterface|null
    {
        return $this->start;
    }

    public function setStart(\DateTimeInterface|null $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): \DateTimeInterface|null
    {
        return $this->end;
    }

    public function setEnd(\DateTimeInterface|null $end): self
    {
        $this->end = $end;

        return $this;
    }

    public function getType(): FiscalperiodType|null
    {
        return $this->type;
    }

    public function setType(FiscalperiodType|null $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getIsCustom(): bool|null
    {
        return $this->isCustom;
    }

    public function setIsCustom(bool|null $isCustom): self
    {
        $this->isCustom = $isCustom;

        return $this;
    }
}

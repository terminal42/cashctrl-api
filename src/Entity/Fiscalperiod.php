<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

class Fiscalperiod extends AbstractEntity
{
    public const TYPE_EARLIEST = 'EARLIEST';
    public const TYPE_LATEST = 'LATEST';

    protected ?string $name = null;
    protected ?\DateTimeInterface $start = null;
    protected ?\DateTimeInterface $end = null;
    protected ?string $type = null;
    protected ?bool $isCustom = null;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): Fiscalperiod
    {
        if (strlen($name) > 30) {
            throw new \LogicException('Fiscalperiod name cannot be longer than 30 characters.');
        }

        $this->name = $name;
        return $this;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(?\DateTimeInterface $start): Fiscalperiod
    {
        $this->start = $start;
        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(?\DateTimeInterface $end): Fiscalperiod
    {
        $this->end = $end;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): Fiscalperiod
    {
        $this->type = $type;
        return $this;
    }

    public function getIsCustom(): ?bool
    {
        return $this->isCustom;
    }

    public function setIsCustom(?bool $isCustom): Fiscalperiod
    {
        $this->isCustom = $isCustom;
        return $this;
    }
}

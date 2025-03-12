<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

use Terminal42\CashctrlApi\Enum\PersonContactType;

class PersonContact implements PropertiesInterface
{
    use PropertiesTrait;

    protected string $address;

    protected PersonContactType $type;

    public function __construct(string $address, PersonContactType $type)
    {
        $this->address = $address;
        $this->type = $type;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getType(): PersonContactType
    {
        return $this->type;
    }

    public function setType(PersonContactType $type): self
    {
        $this->type = $type;

        return $this;
    }
}

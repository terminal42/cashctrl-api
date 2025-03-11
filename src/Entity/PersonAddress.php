<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

class PersonAddress implements PropertiesInterface
{
    use PropertiesTrait;

    public const TYPE_MAIN = 'MAIN';

    public const TYPE_INVOICE = 'INVOICE';

    public const TYPE_DELIVERY = 'DELIVERY';

    public const TYPE_OTHER = 'OTHER';

    protected string $type;

    protected string|null $address = null;

    protected string|null $zip = null;

    protected string|null $city = null;

    protected string|null $country = null;

    public function __construct(string $type, string|null $address = null, string|null $zip = null, string|null $city = null, string|null $country = null)
    {
        $this->type = $type;
        $this->address = $address;
        $this->zip = $zip;
        $this->city = $city;
        $this->country = $country;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getAddress(): string|null
    {
        return $this->address;
    }

    public function setAddress(string|null $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZip(): string|null
    {
        return $this->zip;
    }

    public function setZip(string|null $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function getCity(): string|null
    {
        return $this->city;
    }

    public function setCity(string|null $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): string|null
    {
        return $this->country;
    }

    public function setCountry(string|null $country): self
    {
        $this->country = $country;

        return $this;
    }
}

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
    protected ?string $address = null;
    protected ?string $zip = null;
    protected ?string $city = null;
    protected ?string $country = null;

    public function __construct(string $type, string $address = null, string $zip = null, string $city = null, string $country = null)
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(?string $zip): self
    {
        $this->zip = $zip;
        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;
        return $this;
    }
}

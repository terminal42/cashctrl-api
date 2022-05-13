<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

class PersonContact implements PropertiesInterface
{
    use PropertiesTrait;

    public const PURPOSE_PRIVATE = 'PRIVATE';
    public const PURPOSE_WORK = 'WORK';
    public const PURPOSE_RECEPTION = 'RECEPTION';
    public const PURPOSE_INVOICE = 'INVOICE';

    public const TYPE_EMAIL = 'EMAIL';
    public const TYPE_PHONE = 'PHONE';
    public const TYPE_MOBILE = 'MOBILE';
    public const TYPE_FAX = 'FAX';
    public const TYPE_SKYPE = 'SKYPE';
    public const TYPE_WEBSITE = 'WEBSITE';
    public const TYPE_OTHER = 'OTHER';

    protected string $address;
    protected string $purpose;
    protected string $type;

    public function __construct(string $address, string $purpose, string $type)
    {
        $this->address = $address;
        $this->purpose = $purpose;
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

    public function getPurpose(): string
    {
        return $this->purpose;
    }

    public function setPurpose(string $purpose): self
    {
        $this->purpose = $purpose;
        return $this;
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
}

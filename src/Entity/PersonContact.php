<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

class PersonContact implements PropertiesInterface
{
    use PropertiesTrait;

    public const TYPE_EMAIL_INVOICE = 'EMAIL_INVOICE';
    public const TYPE_EMAIL_WORK = 'EMAIL_WORK';
    public const TYPE_EMAIL_PRIVATE = 'EMAIL_PRIVATE';
    public const TYPE_PHONE_RECEPTION = 'PHONE_RECEPTION';
    public const TYPE_PHONE_WORK = 'PHONE_WORK';
    public const TYPE_PHONE_PRIVATE = 'PHONE_PRIVATE';
    public const TYPE_MOBILE_WORK = 'MOBILE_WORK';
    public const TYPE_MOBILE_PRIVATE = 'MOBILE_PRIVATE';
    public const TYPE_FAX = 'FAX';
    public const TYPE_WEBSITE = 'WEBSITE';
    public const TYPE_MESSENGER = 'MESSENGER';
    public const TYPE_OTHER = 'OTHER';

    protected string $address;
    protected string $type;

    public function __construct(string $address, string $type)
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

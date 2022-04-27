<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

class PersonAddress implements \JsonSerializable
{
    public const TYPE_MAIN = 'MAIN';
    public const TYPE_INVOICE = 'INVOICE';
    public const TYPE_DELIVERY = 'DELIVERY';
    public const TYPE_OTHER = 'OTHER';

    public string $type;
    public ?string $address = null;
    public ?string $zip = null;
    public ?string $city = null;
    public ?string $country = null;

    public function __construct(string $type, string $address = null, string $zip = null, string $city = null, string $country = null)
    {
        $this->type = $type;
        $this->address = $address;
        $this->zip = $zip;
        $this->city = $city;
        $this->country = $country;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => $this->type,
            'address' => $this->address,
            'zip' => $this->zip,
            'city' => $this->city,
            'country' => $this->country,
        ], static fn ($v) => null !== $v);
    }
}

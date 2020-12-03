<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

class PersonContact implements \JsonSerializable
{
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

    public string $address;
    public string $purpose;
    public string $type;

    public function __construct(string $address, string $purpose, string $type)
    {
        $this->address = $address;
        $this->purpose = $purpose;
        $this->type = $type;
    }

    public function jsonSerialize(): array
    {
        return [
            'address' => $this->address,
            'purpose' => $this->purpose,
            'type' => $this->type,
        ];
    }
}

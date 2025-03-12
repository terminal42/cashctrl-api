<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Enum;

enum AddressType: string
{
    case Main = 'MAIN';
    case Invoice = 'INVOICE';
    case Delivery = 'DELIVERY';
    case Other = 'OTHER';
}

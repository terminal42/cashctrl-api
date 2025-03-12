<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Enum;

enum PersonContactType: string
{
    case EmailInvoice = 'EMAIL_INVOICE';
    case EmailWork = 'EMAIL_WORK';
    case EmailPrivate = 'EMAIL_PRIVATE';
    case PhoneReception = 'PHONE_RECEPTION';
    case PhoneWork = 'PHONE_WORK';
    case PhonePrivate = 'PHONE_PRIVATE';
    case MobileWork = 'MOBILE_WORK';
    case MobilePrivate = 'MOBILE_PRIVATE';
    case Fax = 'FAX';
    case Website = 'WEBSITE';
    case Messenger = 'MESSENGER';
    case Other = 'OTHER';
}

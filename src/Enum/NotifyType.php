<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Enum;

enum NotifyType: string
{
    case None = 'NONE';
    case User = 'USER';
    case Person = 'PERSON';
    case ResponsiblePerson = 'RESPONSIBLE_PERSON';
    case Email = 'EMAIL';
}

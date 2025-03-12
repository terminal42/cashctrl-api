<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Enum;

enum BookType: string
{
    case Debit = 'DEBIT';
    case Credit = 'CREDIT';
}

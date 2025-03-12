<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Enum;

enum OrderType: string
{
    case Sales = 'SALES';
    case Purchase = 'PURCHASE';
}

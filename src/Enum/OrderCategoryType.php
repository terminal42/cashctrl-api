<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Enum;

enum OrderCategoryType: string
{
    case Sales = 'SALES';
    case Purchase = 'PURCHASE';
}

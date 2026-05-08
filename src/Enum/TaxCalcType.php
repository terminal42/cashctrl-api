<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Enum;

enum TaxCalcType: string
{
    case Net = 'NET';
    case Gross = 'GROSS';
}

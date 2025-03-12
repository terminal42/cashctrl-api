<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Enum;

enum FiscalperiodType: string
{
    case Earliest = 'EARLIEST';
    case Latest = 'LATEST';
}

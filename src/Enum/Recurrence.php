<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Enum;

enum Recurrence: string
{
    case Yearly = 'YEARLY';
    case Semestral = 'SEMESTRAL';
    case Quarterly = 'QUARTERLY';
    case BiMonthly = 'BI_MONTHLY';
    case Monthly = 'MONTHLY';
    case Weekly = 'WEEKLY';
    case BiWeekly = 'BI_WEEKLY';
    case Daily = 'DAILY';
}

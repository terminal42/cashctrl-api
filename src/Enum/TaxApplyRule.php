<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Enum;

enum TaxApplyRule: string
{
    case Credit = 'CREDIT';
    case Debit = 'DEBIT';
    case Revenue = 'REVENUE';
    case Expense = 'EXPENSE';
    case LegacyRevenue = 'LEGACY_REV';
    case LegacyExpense = 'LEGACY_EXP';
}

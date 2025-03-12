<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Enum;

enum OrderItemType: string
{
    case Article = 'ARTICLE';
    case Text = 'TEXT';
    case Pagebreak = 'PAGEBREAK';
    case Subtotal = 'SUBTOTAL';
}

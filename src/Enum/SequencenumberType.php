<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Enum;

enum SequencenumberType: string
{
    case InventoryStock = 'INVENTORY_STOCK';
    case InventoryService = 'INVENTORY_SERVICE';
    case InventoryAsset = 'INVENTORY_ASSET';
    case Journal = 'JOURNAL';
    case Order = 'ORDER';
    case Person = 'PERSON';
    case SalesInvoice = 'SALES_INVOICE';
}

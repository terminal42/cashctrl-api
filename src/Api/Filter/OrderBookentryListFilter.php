<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api\Filter;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\OrderBookentry;

/**
 * @extends ListFilter<OrderBookentry>
 */
class OrderBookentryListFilter extends ListFilter
{
    public function __construct(
        ApiClientInterface $client,
        string $urlPrefix,
        \Closure $createInstance,
        protected int $id,
    ) {
        parent::__construct($client, $urlPrefix, $createInstance);
    }
}

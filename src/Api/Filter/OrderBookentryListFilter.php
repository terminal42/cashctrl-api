<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api\Filter;

use Terminal42\CashctrlApi\ApiClientInterface;

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

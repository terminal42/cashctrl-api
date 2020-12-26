<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api\Filter;

use Terminal42\CashctrlApi\ApiClientInterface;

class OrderBookentryListFilter extends ListFilter
{
    protected int $id;

    public function __construct(ApiClientInterface $client, string $urlPrefix, \Closure $createInstance, int $id)
    {
        parent::__construct($client, $urlPrefix, $createInstance);

        $this->id = $id;
    }
}

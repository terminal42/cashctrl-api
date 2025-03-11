<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api\Filter;

use Terminal42\CashctrlApi\ApiClientInterface;

class CustomfieldListFilter extends ListFilter
{
    public function __construct(
        ApiClientInterface $client,
        string $urlPrefix,
        \Closure $createInstance,
        protected string $type,
    ) {
        parent::__construct($client, $urlPrefix, $createInstance);
    }
}

<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\Api\Filter\ListFilter;

abstract class AbstractEndpoint extends AbstractCRUDEndpoint
{
    public function list(): ListFilter
    {
        return new ListFilter($this->client, $this->urlPrefix, fn (array $data) => $this->createInstance($data));
    }
}

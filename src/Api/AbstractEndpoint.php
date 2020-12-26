<?php

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\Api\Filter\ListFilter;

abstract class AbstractEndpoint extends AbstractCRUDEndpoint
{
    public function list(): ListFilter
    {
        return new ListFilter($this->client, $this->urlPrefix, function (array $data) {
            return $this->createInstance($data);
        });
    }
}

<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\Api\Filter\ListFilter;
use Terminal42\CashctrlApi\Entity\EntityInterface;

/**
 * @template TEntity of EntityInterface
 *
 * @template-extends AbstractCRUDEndpoint<TEntity>
 */
abstract class AbstractEndpoint extends AbstractCRUDEndpoint
{
    /**
     * @return ListFilter<TEntity>
     */
    public function list(): ListFilter
    {
        return new ListFilter($this->client, $this->urlPrefix, fn (array $data) => $this->createInstance($data));
    }
}

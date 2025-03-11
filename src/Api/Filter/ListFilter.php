<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api\Filter;

use Terminal42\CashctrlApi\ApiClientInterface;

/**
 * @template TEntity
 *
 * @implements \IteratorAggregate<TEntity>
 */
class ListFilter implements \IteratorAggregate
{
    public const EQUALS = 'eq';

    public const NOT_EQUALS = 'neq';

    protected array|null $filter = null;

    public function __construct(
        private readonly ApiClientInterface $client,
        private readonly string $urlPrefix,
        private readonly \Closure $createInstance,
    ) {
    }

    /**
     * @return \ArrayIterator<int, TEntity>
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->get());
    }

    /**
     * @return array<TEntity>
     */
    public function get(): array
    {
        $result = $this->client->get($this->urlPrefix.'/list.json', $this->toArray());

        return array_map($this->createInstance, $result->data());
    }

    /**
     * @return ListFilter<TEntity>
     */
    public function filter(string $property, float|string $value, string|null $comparison = null): self
    {
        if (null === $this->filter) {
            $this->filter = [];
        }

        $filter = ['field' => $property, 'value' => $value];

        if (null !== $comparison) {
            $filter['comparison'] = $comparison;
        }

        $this->filter[] = $filter;

        return $this;
    }

    /**
     * @return array{
     *     filter: array<array{
     *         field: string,
     *         value: float|string,
     *         comparison?: string
     *     }>
     * }
     */
    public function toArray(): array
    {
        return [
            'filter' => $this->filter,
        ];
    }
}

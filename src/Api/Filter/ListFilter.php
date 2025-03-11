<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api\Filter;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\EntityInterface;
use Terminal42\CashctrlApi\Entity\PropertiesTrait;

class ListFilter implements \IteratorAggregate
{
    use PropertiesTrait;

    public const EQUALS = 'eq';

    public const NOT_EQUALS = 'neq';

    protected array|null $filter = null;

    public function __construct(
        private ApiClientInterface $client,
        private string $urlPrefix,
        private \Closure $createInstance,
    ) {
    }

    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->get());
    }

    /**
     * @return array<EntityInterface>
     */
    public function get(): array
    {
        $result = $this->client->get($this->urlPrefix.'/list.json', $this->toArray());

        return array_map($this->createInstance, $result->data());
    }

    public function filter(string $property, $value, string|null $comparison = null): self
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
}

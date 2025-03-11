<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\EntityInterface;
use Terminal42\CashctrlApi\Exception\DomainException;
use Terminal42\CashctrlApi\Result;

abstract class AbstractCRUDEndpoint
{
    public function __construct(
        protected ApiClientInterface $client,
        protected string $urlPrefix,
    ) {
    }

    public function read(int $id): EntityInterface|null
    {
        $result = $this->get('read.json', ['id' => $id], false);

        if (!$result->isSuccessful()) {
            return null;
        }

        return $this->createInstance($result->data());
    }

    public function create(EntityInterface $entity): Result
    {
        if (null !== $entity->getId()) {
            throw new DomainException('Entity MUST NOT have an ID to call "create.json" endpoint.');
        }

        return $this->post('create.json', $entity->toArray());
    }

    public function update(EntityInterface $entity): Result
    {
        if (null === $entity->getId()) {
            throw new DomainException('Entity MUST have an ID to call "update.json" endpoint.');
        }

        return $this->post('update.json', $entity->toArray());
    }

    public function delete(array $ids): Result
    {
        return $this->post('delete.json', ['ids' => $ids]);
    }

    protected function get(string $url, array $params = [], bool $throwValidationError = true)
    {
        return $this->client->get($this->urlPrefix.'/'.$url, $params, $throwValidationError);
    }

    protected function post(string $url, array $params, bool $throwValidationError = true): Result
    {
        return $this->client->post($this->urlPrefix.'/'.$url, $params, $throwValidationError);
    }

    abstract protected function createInstance(array $data): EntityInterface;
}

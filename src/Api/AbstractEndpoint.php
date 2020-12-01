<?php

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ClientInterface;
use Terminal42\CashctrlApi\Entity\EntityInterface;
use Terminal42\CashctrlApi\Exception\DomainException;
use Terminal42\CashctrlApi\Result;

abstract class AbstractEndpoint
{
    protected ClientInterface $client;
    protected string $urlPrefix;

    public function __construct(ClientInterface $client, string $urlPrefix)
    {
        $this->client = $client;
        $this->urlPrefix = $urlPrefix;
    }

    public function read(int $id): EntityInterface
    {
        return $this->createInstance($this->get('read.json', ['id' => $id]));
    }

    /**
     * @return array<EntityInterface>
     */
    public function list(): array
    {
        return array_map(function (array $data) {
            return $this->createInstance($data);
        }, $this->get('list.json'));
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

    protected function get(string $url, array $params = [])
    {
        return $this->client->get($this->urlPrefix.'/'.$url, $params);
    }

    protected function post(string $url, array $params): Result
    {
        return $this->client->post($this->urlPrefix.'/'.$url, $params);
    }

    abstract protected function createInstance(array $data): EntityInterface;
}

<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Customfield;
use Terminal42\CashctrlApi\Result;

/**
 * @method Customfield read(int $id)
 * @method Result create(Customfield $customfield)
 * @method Result update(Customfield $customfield)
 * @method Result delete(array $ids)
 */
class CustomfieldEndpoint extends AbstractEndpoint
{
    public const TYPE_JOURNAL = 'JOURNAL';
    public const TYPE_ACCOUNT = 'ACCOUNT';
    public const TYPE_PERSON = 'PERSON';
    public const TYPE_INVENTORY_STOCK = 'INVENTORY_STOCK';
    public const TYPE_INVENTORY_SERVICE = 'INVENTORY_SERVICE';
    public const TYPE_INVENTORY_ASSET = 'INVENTORY_ASSET';
    public const TYPE_ORDER = 'ORDER';

    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'customfield');
    }

    /**
     * @return Customfield[]
     */
    public function list(string $type = null): array
    {
        if (null === $type) {
            return array_merge(
                $this->list(self::TYPE_JOURNAL),
                $this->list(self::TYPE_ACCOUNT),
                $this->list(self::TYPE_PERSON),
                $this->list(self::TYPE_INVENTORY_STOCK),
                $this->list(self::TYPE_INVENTORY_SERVICE),
                $this->list(self::TYPE_INVENTORY_ASSET),
                $this->list(self::TYPE_ORDER),
            );
        }

        return array_map(function (array $data) {
            return $this->createInstance($data);
        }, $this->get('list.json', ['type' => $type])->data());
    }

    public function reorder(array $ids, int $target, bool $before = true): Result
    {
        return $this->post('reorder.json', [
            'ids' => implode(',', $ids),
            'target' => $target,
            'before' => $before,
        ]);
    }

    protected function createInstance(array $data): Customfield
    {
        return Customfield::create($data);
    }
}

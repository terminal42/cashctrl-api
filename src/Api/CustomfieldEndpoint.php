<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\Api\Filter\CustomfieldListFilter;
use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Customfield;
use Terminal42\CashctrlApi\Result;

/**
 * @extends AbstractCRUDEndpoint<Customfield>
 */
class CustomfieldEndpoint extends AbstractCRUDEndpoint
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

    public function list(string $type): CustomfieldListFilter
    {
        return new CustomfieldListFilter(
            $this->client,
            $this->urlPrefix,
            fn (array $data) => $this->createInstance($data),
            $type,
        );
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

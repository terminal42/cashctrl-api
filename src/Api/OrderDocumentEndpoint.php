<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\OrderDocument;
use Terminal42\CashctrlApi\Result;

/**
 * @method OrderDocument read(int $id)
 * @method OrderDocument[] list()
 * @method Result create(OrderDocument $entity)
 * @method Result update(OrderDocument $entity)
 * @method Result delete(array $ids)
 */
class OrderDocumentEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'order/document');
    }

    protected function createInstance(array $data): OrderDocument
    {
        return OrderDocument::create($data);
    }
}

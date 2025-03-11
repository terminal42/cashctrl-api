<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\Api\Filter\ListFilter;
use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\OrderTemplate;
use Terminal42\CashctrlApi\Result;

/**
 * @method OrderTemplate|null              read(int $id)
 * @method array<OrderTemplate>|ListFilter list()
 * @method Result                          create(OrderTemplate $entity)
 * @method Result                          update(OrderTemplate $entity)
 * @method Result                          delete(array $ids)
 */
class OrderTemplateEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'order/template');
    }

    protected function createInstance(array $data): OrderTemplate
    {
        return OrderTemplate::create($data);
    }
}

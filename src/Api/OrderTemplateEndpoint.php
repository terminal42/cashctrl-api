<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\OrderTemplate;

/**
 * @extends AbstractEndpoint<OrderTemplate>
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

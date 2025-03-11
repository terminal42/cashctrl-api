<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Tax;

/**
 * @extends AbstractEndpoint<Tax>
 */
class TaxEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'tax');
    }

    protected function createInstance(array $data): Tax
    {
        return Tax::create($data);
    }
}

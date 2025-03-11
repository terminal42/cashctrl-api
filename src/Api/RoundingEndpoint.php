<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Rounding;

/**
 * @extends AbstractEndpoint<Rounding>
 */
class RoundingEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'rounding');
    }

    protected function createInstance(array $data): Rounding
    {
        return Rounding::create($data);
    }
}

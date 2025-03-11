<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\PersonTitle;

/**
 * @extends AbstractEndpoint<PersonTitle>
 */
class PersonTitleEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'person/title');
    }

    protected function createInstance(array $data): PersonTitle
    {
        return PersonTitle::create($data);
    }
}

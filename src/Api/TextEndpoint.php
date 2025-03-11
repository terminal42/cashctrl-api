<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Text;

/**
 * @extends AbstractEndpoint<Text>
 */
class TextEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'text');
    }

    protected function createInstance(array $data): Text
    {
        return Text::create($data);
    }
}

<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Text;
use Terminal42\CashctrlApi\Result;
use Terminal42\CashctrlApi\Api\Filter\ListFilter;

/**
 * @method Text read(int $id)
 * @method Text[]|ListFilter list()
 * @method Result create(Text $entity)
 * @method Result update(Text $entity)
 * @method Result delete(array $ids)
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

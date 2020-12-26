<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\PersonCategory;
use Terminal42\CashctrlApi\Result;
use Terminal42\CashctrlApi\Api\Filter\ListFilter;

/**
 * @method PersonCategory read(int $id)
 * @method PersonCategory[]|ListFilter list()
 * @method Result create(PersonCategory $entity)
 * @method Result update(PersonCategory $entity)
 * @method Result delete(array $ids)
 */
class PersonCategoryEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'person/category');
    }

    public function tree(int $parent = null): Result
    {
        $params = [];

        if (null !== $parent) {
            $params['id'] = $parent;
        }

        return $this->get('tree.json', $params);
    }

    protected function createInstance(array $data): PersonCategory
    {
        return PersonCategory::create($data);
    }
}

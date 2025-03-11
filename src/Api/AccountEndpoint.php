<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\Api\Filter\AccountListFilter;
use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Account;
use Terminal42\CashctrlApi\Result;

/**
 * @extends AbstractEndpoint<Account>
 */
class AccountEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'account');
    }

    public function list(): AccountListFilter
    {
        return new AccountListFilter($this->client, 'account', fn (array $data) => $this->createInstance($data));
    }

    public function balance(int $id, \DateTimeInterface|null $date = null): string
    {
        $params = ['id' => $id];

        if (null !== $date) {
            $params['date'] = $date->format('Y-m-d');
        }

        return $this->get('balance', $params);
    }

    public function categorize(array $ids, int $target): Result
    {
        return $this->post('categorize.json', ['ids' => implode(',', $ids), 'target' => $target]);
    }

    protected function createInstance(array $data): Account
    {
        return Account::create($data);
    }
}

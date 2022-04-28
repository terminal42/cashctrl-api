<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\Api\Filter\AccountListFilter;
use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Account;
use Terminal42\CashctrlApi\Result;

/**
 * @method Account|null read(int $id)
 * @method Result create(Account $account)
 * @method Result update(Account $account)
 * @method Result delete(array $ids)
 */
class AccountEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'account');
    }

    /**
     * @return Account[]|AccountListFilter
     */
    public function list(): AccountListFilter
    {
        return new AccountListFilter($this->client, 'account', function (array $data) {
            return $this->createInstance($data);
        });
    }

    public function balance(int $id, \DateTimeInterface $date = null)
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

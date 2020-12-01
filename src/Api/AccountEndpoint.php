<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ClientInterface;
use Terminal42\CashctrlApi\Entity\Account;
use Terminal42\CashctrlApi\Result;

/**
 * @method Account read(int $id)
 * @method Account[] list()
 * @method Result create(Account $account)
 * @method Result update(Account $account)
 * @method Result delete(array $ids)
 */
class AccountEndpoint extends AbstractEndpoint
{
    public function __construct(ClientInterface $client)
    {
        parent::__construct($client, 'account');
    }

    protected function createInstance(array $data): Account
    {
        return Account::create($data);
    }
}

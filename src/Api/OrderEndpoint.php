<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\Api\Filter\OrderListFilter;
use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Order;
use Terminal42\CashctrlApi\Result;

/**
 * @extends AbstractCRUDEndpoint<Order>
 */
class OrderEndpoint extends AbstractCRUDEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'order');
    }

    public function list(): OrderListFilter
    {
        return new OrderListFilter($this->client, 'order', fn (array $data) => $this->createInstance($data));
    }

    public function statusInfo(int $id): Result|string
    {
        return $this->get('status_info.json', ['id' => $id]);
    }

    public function updateStatus(int $id, int $statusId): Result
    {
        return $this->post('update_status.json', ['id' => $id, 'statusId' => $statusId]);
    }

    public function updateRecurrence(int $id, \DateTimeInterface|null $endDate = null, string|null $recurrence = null, \DateTimeInterface|null $startDate = null): Result
    {
        $params = ['id' => $id];

        if (null !== $endDate) {
            $params['endDate'] = $endDate->format('Y-m-d');
        }

        if (null !== $recurrence) {
            $params['recurrence'] = $recurrence;
        }

        if (null !== $startDate) {
            $params['startDate'] = $startDate->format('Y-m-d');
        }

        return $this->post('update_recurrence.json', $params);
    }

    public function dossier(int $id): Result
    {
        return $this->get('dossier.json', ['id' => $id]);
    }

    protected function createInstance(array $data): Order
    {
        return Order::create($data);
    }
}

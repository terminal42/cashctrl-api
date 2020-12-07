<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\Order;
use Terminal42\CashctrlApi\Result;

/**
 * @method Order read(int $id)
 * @method Order[]|ListFilter list()
 * @method Result create(Order $entity)
 * @method Result update(Order $entity)
 * @method Result delete(array $ids)
 */
class OrderEndpoint extends AbstractEndpoint
{
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client, 'order');
    }

    public function statusInfo(int $id)
    {
        return $this->get('status_info.json', ['id' => $id]);
    }

    public function updateStatus(int $id, int $statusId)
    {
        return $this->post('update_status.json', ['id' => $id, 'statusId' => $statusId]);
    }

    public function updateRecurrence(int $id, \DateTime $endDate = null, string $recurrence = null, \DateTime $startDate = null)
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

    public function dossier(int $id)
    {
        return $this->get('dossier.json', ['id' => $id]);
    }

    protected function createInstance(array $data): Order
    {
        return Order::create($data);
    }
}

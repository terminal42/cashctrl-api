<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\ApiClientInterface;
use Terminal42\CashctrlApi\Entity\OrderDocument;
use Terminal42\CashctrlApi\Result;

class OrderDocumentEndpoint
{
    public function __construct(private readonly ApiClientInterface $client)
    {
    }

    public function read(int $id): OrderDocument
    {
        return OrderDocument::create(
            $this->client->get('order/document/read.json', ['id' => $id])->data(),
        );
    }

    public function downloadPdf(array $ids, string|null $language = null): string
    {
        $params = ['ids' => implode(',', $ids)];

        if (null !== $language) {
            $params['lang'] = $language;
        }

        return (string) $this->client->get('order/document/read.pdf', $params);
    }

    public function downloadZip(array $ids, string|null $language = null): string
    {
        $params = ['ids' => implode(',', $ids)];

        if (null !== $language) {
            $params['lang'] = $language;
        }

        return (string) $this->client->get('order/document/read.zip', $params);
    }

    /**
     * @param array{
     *     footer?: string,
     *     header?: string,
     *     isDisplayItemGross?: bool,
     *     language?: string,
     *     orgAddress?: string,
     *     orgLocationId?: int,
     *     recipientAddress?: string,
     *     recipientAddressId?: int,
     *     templateId?: int,
     * } $params
     */
    public function update(int $id, array $params = []): Result
    {
        $params['id'] = $id;

        return $this->client->post('order/document/update.json', $params);
    }
}

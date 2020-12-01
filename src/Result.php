<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi;

class Result
{
    private array $responseData;

    public function __construct(array $responseData)
    {
        $this->responseData = $responseData;
    }

    public function isSuccessful(): bool
    {
        return (bool) ($this->responseData['success'] ?? false);
    }

    public function hasErrors(): bool
    {
        return !$this->isSuccessful();
    }

    public function getErrors(): array
    {
        return $this->responseData['errors'] ?? [];
    }
}

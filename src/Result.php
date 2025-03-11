<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi;

class Result extends \ArrayObject
{
    public function isSuccessful(): bool
    {
        return (bool) ($this['success'] ?? true);
    }

    public function hasErrors(): bool
    {
        return !$this->isSuccessful();
    }

    public function errors(): array
    {
        if (isset($this['errors'])) {
            return (array) $this['errors'];
        }

        return isset($this['errorMessage']) ? [$this['errorMessage']] : [];
    }

    public function insertId(): int|null
    {
        return isset($this['insertId']) ? (int) $this['insertId'] : null;
    }

    public function data(): array|null
    {
        return isset($this['data']) ? (array) $this['data'] : null;
    }
}

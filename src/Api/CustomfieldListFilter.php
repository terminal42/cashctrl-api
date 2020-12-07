<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Api;

use Terminal42\CashctrlApi\Exception\DomainException;

class CustomfieldListFilter extends ListFilter
{
    private ?string $type = null;

    public function type(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function get(): array
    {
        if (null === $this->type) {
            throw new DomainException('You must specify a type to list custom fields');
        }

        return parent::get();
    }
}

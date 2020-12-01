<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

interface EntityInterface
{
    public function getId(): ?int;

    public function toArray(): array;

    public static function create(array $data);
}

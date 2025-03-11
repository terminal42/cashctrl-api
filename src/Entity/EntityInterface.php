<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

interface EntityInterface extends PropertiesInterface
{
    public function getId(): int|null;
}

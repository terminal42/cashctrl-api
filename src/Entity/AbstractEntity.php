<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

abstract class AbstractEntity implements EntityInterface
{
    use PropertiesTrait;

    protected int|null $id;

    public function __construct(int|null $id = null)
    {
        $this->id = $id;
    }

    public function getId(): int|null
    {
        return $this->id;
    }
}

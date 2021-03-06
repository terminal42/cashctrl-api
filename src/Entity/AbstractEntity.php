<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

/**
 * @method static create(array $data): self
 */
abstract class AbstractEntity implements EntityInterface
{
    use PropertiesTrait;

    protected ?int $id;

    public function __construct(int $id = null)
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}

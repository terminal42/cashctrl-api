<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

/**
 * @method static create(array $data, bool $partial = false): self
 */
abstract class AbstractEntity implements EntityInterface
{
    use PropertiesTrait;

    protected ?int $id;

    public function __construct(int $id = null)
    {
        $this->id = $id;

        if (null !== $id) {
            $this->partial = true;
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}

<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

use Terminal42\CashctrlApi\Enum\SequencenumberType;

class Sequencenumber extends AbstractEntity
{
    protected SequencenumberType $type;

    protected int|null $categoryId = null;

    public function __construct(SequencenumberType $type, int|null $id = null)
    {
        parent::__construct($id);

        $this->type = $type;
    }

    public function getType(): SequencenumberType
    {
        return $this->type;
    }

    public function setType(SequencenumberType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCategoryId(): int|null
    {
        return $this->categoryId;
    }

    public function setCategoryId(int|null $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }
}

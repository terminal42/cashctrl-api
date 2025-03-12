<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

use Terminal42\CashctrlApi\Enum\IconColor;
use Terminal42\CashctrlApi\XmlHelper;

class OrderCategoryStatus implements PropertiesInterface
{
    use PropertiesTrait;

    protected IconColor $icon;

    protected string $name;

    protected string|null $actionId = null;

    protected bool|null $isAddStock = null;

    protected bool|null $isBook = null;

    protected bool|null $isClosed = null;

    protected bool|null $isRemoveStock = null;

    public function __construct(IconColor $icon, string $name)
    {
        $this->icon = $icon;
        $this->name = $name;
    }

    public function getIcon(): IconColor
    {
        return $this->icon;
    }

    public function setIcon(IconColor $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getActionId(): string|null
    {
        return $this->actionId;
    }

    public function setActionId(string|null $actionId): self
    {
        $this->actionId = $actionId;

        return $this;
    }

    public function getIsAddStock(): bool|null
    {
        return $this->isAddStock;
    }

    public function setIsAddStock(bool|null $isAddStock): self
    {
        $this->isAddStock = $isAddStock;

        return $this;
    }

    public function getIsBook(): bool|null
    {
        return $this->isBook;
    }

    public function setIsBook(bool|null $isBook): self
    {
        $this->isBook = $isBook;

        return $this;
    }

    public function getIsClosed(): bool|null
    {
        return $this->isClosed;
    }

    public function setIsClosed(bool|null $isClosed): self
    {
        $this->isClosed = $isClosed;

        return $this;
    }

    public function getIsRemoveStock(): bool|null
    {
        return $this->isRemoveStock;
    }

    public function setIsRemoveStock(bool|null $isRemoveStock): self
    {
        $this->isRemoveStock = $isRemoveStock;

        return $this;
    }

    public function getLocaleName(string $language): string
    {
        // Not a localized name
        if (!str_starts_with($this->name, '<values>')) {
            return $this->name;
        }

        $data = XmlHelper::parseValues($this->name);

        return $data[$language] ?? reset($data);
    }

    public function setLocaleName(string $language, string $name): self
    {
        $data = [];

        if (str_starts_with($this->name, '<values>')) {
            $data = XmlHelper::parseValues($this->name);
        }

        $data[$language] = $name;

        $this->name = XmlHelper::dumpValues($data);

        return $this;
    }
}

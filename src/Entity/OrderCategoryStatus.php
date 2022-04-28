<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

use Terminal42\CashctrlApi\XmlHelper;

class OrderCategoryStatus implements PropertiesInterface
{
    use PropertiesTrait;

    public const ICON_BLUE = 'BLUE';
    public const ICON_GREEN = 'GREEN';
    public const ICON_RED = 'RED';
    public const ICON_YELLOW = 'YELLOW';
    public const ICON_ORANGE = 'ORANGE';
    public const ICON_BLACK = 'BLACK';
    public const ICON_GRAY = 'GRAY';
    public const ICON_BROWN = 'BROWN';
    public const ICON_VIOLET = 'VIOLET';
    public const ICON_PINK = 'PINK';

    protected string $icon;
    protected string $name;
    protected ?string $actionId = null;
    protected ?bool $isAddStock = null;
    protected ?bool $isBook = null;
    protected ?bool $isClosed = null;
    protected ?bool $isRemoveStock = null;

    public function __construct(string $icon, string $name)
    {
        $this->icon = $icon;
        $this->name = $name;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
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

    public function getActionId(): ?string
    {
        return $this->actionId;
    }

    public function setActionId(?string $actionId): self
    {
        $this->actionId = $actionId;
        return $this;
    }

    public function getIsAddStock(): ?bool
    {
        return $this->isAddStock;
    }

    public function setIsAddStock(?bool $isAddStock): self
    {
        $this->isAddStock = $isAddStock;
        return $this;
    }

    public function getIsBook(): ?bool
    {
        return $this->isBook;
    }

    public function setIsBook(?bool $isBook): self
    {
        $this->isBook = $isBook;
        return $this;
    }

    public function getIsClosed(): ?bool
    {
        return $this->isClosed;
    }

    public function setIsClosed(?bool $isClosed): self
    {
        $this->isClosed = $isClosed;
        return $this;
    }

    public function getIsRemoveStock(): ?bool
    {
        return $this->isRemoveStock;
    }

    public function setIsRemoveStock(?bool $isRemoveStock): self
    {
        $this->isRemoveStock = $isRemoveStock;
        return $this;
    }

    public function getLocaleName(string $language): string
    {
        // Not a localized name
        if (0 !== strpos($this->name, '<values>')) {
            return $this->name;
        }

        $data = XmlHelper::parseValues($this->name);

        return $data[$language] ?? reset($data);
    }

    public function setLocaleName(string $language, string $name): self
    {
        $data = [];

        if (0 === strpos($this->name, '<values>')) {
            $data = XmlHelper::parseValues($this->name);
        }

        $data[$language] = $name;

        $this->name = XmlHelper::dumpValues($data);

        return $this;
    }
}

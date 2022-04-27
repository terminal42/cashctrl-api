<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

use Terminal42\CashctrlApi\XmlHelper;

class OrderCategoryStatus implements \JsonSerializable
{
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

    public string $icon;
    public string $name;
    public ?string $actionId = null;
    public ?bool $isAddStock = null;
    public ?bool $isBook = null;
    public ?bool $isClosed = null;
    public ?bool $isRemoveStock = null;

    public function __construct(string $icon, string $name)
    {
        $this->icon = $icon;
        $this->name = $name;
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

    public function jsonSerialize(): array
    {
        return array_filter([
            'icon' => $this->icon,
            'name' => $this->name,
            'actionId' => $this->actionId,
            'isAddStock' => $this->isAddStock,
            'isBook' => $this->isBook,
            'isClosed' => $this->isClosed,
            'isRemoveStock' => $this->isRemoveStock,
        ], static fn ($v) => null !== $v);
    }
}

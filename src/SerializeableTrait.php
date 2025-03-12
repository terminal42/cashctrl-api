<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi;

use Terminal42\CashctrlApi\Entity\PropertiesInterface;

trait SerializeableTrait
{
    public function toArray(): array
    {
        $ref = new \ReflectionClass($this);
        $props = $ref->getProperties(\ReflectionProperty::IS_PROTECTED);

        $data = [];

        foreach ($props as $prop) {
            $value = $prop->getValue($this);

            if (null === $value) {
                continue;
            }

            $value = $this->convertValue($value);

            if (\is_array($value) || $value instanceof \JsonSerializable) {
                $value = json_encode($value, JSON_THROW_ON_ERROR);
            }

            $data[$prop->getName()] = $value;
        }

        return $data;
    }

    /**
     * @param array|mixed|string $value
     *
     * @return array|mixed|string
     */
    private function convertValue($value)
    {
        if (\is_array($value)) {
            foreach ($value as &$v) {
                $v = $this->convertValue($v);
            }
        } elseif ($value instanceof \BackedEnum) {
            $value = $value->value;
        } elseif ($value instanceof \DateTimeInterface) {
            // TODO what about time?
            $value = $value->format('Y-m-d');
        } elseif ($value instanceof PropertiesInterface) {
            $value = $value->toArray();
        }

        return $value;
    }
}

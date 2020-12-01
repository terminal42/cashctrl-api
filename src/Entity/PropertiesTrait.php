<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

trait PropertiesTrait
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

            // TODO what about time?
            if ($value instanceof \DateTime) {
                $value = $value->format('Y-m-d');
            }

            // TODO auto oder manuell?
            //if (\is_array($value)) {
            //    $value = \json_encode($value, JSON_THROW_ON_ERROR);
            //}

            $data[$prop->getName()] = $value;
        }

        return $data;
    }

    public static function create(array $data): self
    {
        $ref = new \ReflectionClass(static::class);

        /** @var self $instance */
        $instance = $ref->newInstanceWithoutConstructor();

        foreach ($data as $k => $v) {
            if (!$ref->hasProperty($k)) {
                continue;
            }

            $prop = $ref->getProperty($k);

            if (!$prop->isProtected()) {
                continue;
            }

            $type = $prop->getType();

            // Ignore properties of unknown types
            if ($type && !$type->isBuiltin()) {
                continue;
            }

            if ($type->isBuiltin()) {
                settype($value, (string) $type);
            }

            $prop->setValue($instance, $v);
        }

        return $instance;
    }
}

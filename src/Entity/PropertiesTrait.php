<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

trait PropertiesTrait
{
    private array $additionalData = [];

    public function toArray(): array
    {
        $ref = new \ReflectionClass($this);
        $props = $ref->getProperties(\ReflectionProperty::IS_PROTECTED);

        $data = [];
        foreach ($props as $prop) {
            $prop->setAccessible(true);
            $value = $prop->getValue($this);

            if (null === $value) {
                continue;
            }

            // TODO what about time?
            if ($value instanceof \DateTime) {
                $value = $value->format('Y-m-d');
            }

            if (\is_array($value) || $value instanceof \JsonSerializable) {
                $value = \json_encode($value, JSON_THROW_ON_ERROR);
            }

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
                $instance->additionalData[$k] = $v;
                continue;
            }

            $prop = $ref->getProperty($k);

            if (!$prop->isProtected()) {
                continue;
            }

            $type = $prop->getType();

            if (null !== $type && null !== $v) {
                if ($type->isBuiltin()) {
                    settype($v, (string) $type);
                } elseif (\is_a((string) $type, \DateTime::class, true)) {
                    $v = \DateTime::createFromFormat('Y-m-d H:i:s.v', $v);
                } else {
                    continue;
                }
            }

            $prop->setAccessible(true);
            $prop->setValue($instance, $v);
        }

        return $instance;
    }

    /** @noinspection MagicMethodsValidityInspection */
    public function __get(string $key)
    {
        return $this->additionalData[$key] ?? null;
    }
}

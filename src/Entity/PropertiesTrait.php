<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

use Terminal42\CashctrlApi\ApiClient;
use Terminal42\CashctrlApi\Exception\InvalidArgumentException;

trait PropertiesTrait
{
    /**
     * @var array<string, mixed>
     */
    private array $additionalData = [];

    /**
     * @noinspection MagicMethodsValidityInspection
     *
     * @return string|mixed
     */
    public function __get(string $key)
    {
        return $this->additionalData[$key] ?? null;
    }

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

    public static function create(array $data): static
    {
        $ref = new \ReflectionClass(static::class);

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

            if ($type instanceof \ReflectionNamedType && null !== $v) {
                $class = $type->getName();

                if ($type->isBuiltin()) {
                    settype($v, $class);
                } elseif (is_a($class, \DateTimeInterface::class, true)) {
                    try {
                        $v = ApiClient::parseDateTime($v);
                    } catch (InvalidArgumentException) {
                        continue;
                    }
                } elseif (is_a($class, PropertiesInterface::class, true)) {
                    $v = $class::create($v);
                } else {
                    continue;
                }
            }

            $prop->setValue($instance, $v);
        }

        return $instance;
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
        } elseif ($value instanceof \DateTimeInterface) {
            // TODO what about time?
            $value = $value->format('Y-m-d');
        } elseif ($value instanceof PropertiesInterface) {
            $value = $value->toArray();
        }

        return $value;
    }
}

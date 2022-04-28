<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

use Terminal42\CashctrlApi\ApiClient;
use Terminal42\CashctrlApi\Exception\InvalidArgumentException;

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
            if ($value instanceof \DateTimeInterface) {
                $value = $value->format('Y-m-d');
            } elseif ($value instanceof PropertiesInterface) {
                $value = $value->toArray();
            } elseif (\is_array($value) || $value instanceof \JsonSerializable) {
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
                    settype($v, $type->getName());
                } elseif (\is_a($type->getName(), \DateTimeInterface::class, true)) {
                    try {
                        $v = ApiClient::parseDateTime($v);
                    } catch (InvalidArgumentException $e) {
                        continue;
                    }
                } elseif (is_a($type->getName(), PropertiesInterface::class, true)) {
                    /** @var PropertiesInterface $class */
                    $class = $type->getName();
                    $v = $class::create($v);
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

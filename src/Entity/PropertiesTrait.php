<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

use Terminal42\CashctrlApi\ApiClient;
use Terminal42\CashctrlApi\Exception\InvalidArgumentException;
use Terminal42\CashctrlApi\SerializeableTrait;

trait PropertiesTrait
{
    use SerializeableTrait;

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
                } elseif (is_a($class, \BackedEnum::class, true)) {
                    $v = $class::from($v);
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
}

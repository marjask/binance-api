<?php

namespace Trait\ToArray;

use Binance\Collection\AbstractCollection;
use Binance\ValueObject\AbstractValueObject;
use ReflectionAttribute;
use ReflectionClass;
use ReflectionProperty;

trait ToArrayTrait
{
    public function toArray(): array
    {
        $result = [];

        if ($this instanceof AbstractCollection) {
            /**
             * @var string $property
             * @var AbstractValueObject|object|string|int|bool|float|null $value
             */
            foreach ($this as $property => $value) {
                if (is_object($value) && method_exists($value, 'toArray')) {
                    $result[$property] = $value->toArray();
                } elseif ($value instanceof AbstractValueObject && !is_null($value->getValue())) {
                    $result[$property] = $value->getValue();
                } elseif (!is_null($value)) {
                    $result[$property] = $value;
                }
            }

            return $result;
        }

        $class = new ReflectionClass($this);
        $properties = $class->getProperties();

        foreach ($properties as $property) {
            if ($this->isIgnore($property)) {
                continue;
            }

            if (!$property->isInitialized($this)) {
                continue;
            }

            $name = $property->getName();
            $value = $property->getValue($this);

            if ($value instanceof AbstractCollection && method_exists($value, 'toString')) {
                $result[$name] = $value->toString();
            } elseif ($value instanceof AbstractCollection) {
                $result[$name] = $value->toArray();
            } elseif (is_object($value) && method_exists($value, 'toArray')) {
                $result[$name] = $value->toArray();
            } elseif ($value instanceof AbstractValueObject && !is_null($value->getValue())) {
                $result[$name] = $value->getValue();
            } elseif (!is_null($value)) {
                $result[$name] = $value;
            }
        }

        return $result;
    }

    private function isIgnore(ReflectionProperty $property): bool
    {
        $attributes = $property->getAttributes(
            ToArrayIgnore::class,
            ReflectionAttribute::IS_INSTANCEOF
        );

        /** @var ReflectionAttribute $attribute */
        foreach ($attributes as $attribute) {
            if ($attribute->getName() === ToArrayIgnore::class) {
                return true;
            }
        }

        return false;
    }
}

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

        $class = new ReflectionClass(static::class);
        $properties = $class->getProperties();

        /** @var ReflectionProperty $property */
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
            } else if (is_object($value) && method_exists($value, 'toArray')) {
                $result[$name] = $value->toArray();
            } elseif ($value instanceof AbstractValueObject) {
                $result[$name] = $value->getValue();
            } else {
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

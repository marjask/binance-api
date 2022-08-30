<?php

declare(strict_types=1);

namespace Binance\ValueObject;

final class ValueObjectUtils
{
    public static function getOrDefault(?AbstractValueObject $vo, mixed $default = null)
    {
        return $vo instanceof AbstractValueObject ? $vo->getValue() : $default;
    }
}

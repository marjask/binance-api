<?php

declare(strict_types=1);

namespace Binance\ValueObject;

final class ValueObjectUtils
{
    public static function getOrDefault(?AbstractVO $vo, mixed $default = null)
    {
        return $vo instanceof AbstractVO ? $vo->getValue() : $default;
    }
}

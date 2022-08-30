<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use InvalidArgumentException;

class Real extends AbstractValueObject
{
    public function __construct(mixed $value)
    {
        if (is_string($value) && is_int(strpos($value, ',')) && !is_int(strpos($value, '.'))) {
            $value = str_replace(',', '.', $value);
        }

        if (!is_numeric($value)) {
            throw new InvalidArgumentException(
                sprintf(
                    'Cannot convert value (%s) to %s',
                    is_object($value) || is_array($value) ? json_encode($value) : $value,
                    self::class
                )
            );
        }

        $this->setValue((float) $value);
    }

    public function getValue(): float
    {
        return $this->value;
    }
}

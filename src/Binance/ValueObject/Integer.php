<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use InvalidArgumentException;

class Integer extends AbstractValueObject
{
    public function __construct(mixed $value)
    {
        if (!is_numeric($value)) {
            if (is_object($value)) {
                throw new InvalidArgumentException('Cannot convert value of class "' . get_class($value) . '" to an integer.');
            } else {
                throw new InvalidArgumentException('Cannot convert value of type "' . gettype($value) . '" to an integer.');
            }
        }

        $intValue = (int)(string)$value;

        if ((string)$intValue != (string)$value) {
            throw new InvalidArgumentException('Cannot convert value "'. $value . '" to an integer.');
        }

        $this->setValue($intValue);
    }

    public function getValue(): int
    {
        return $this->value;
    }
}

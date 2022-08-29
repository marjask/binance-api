<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use InvalidArgumentException;

class Integer extends AbstractValueObject
{
    public function __construct(mixed $seconds)
    {
        if (!is_numeric($seconds)) {
            if (is_object($seconds)) {
                throw new InvalidArgumentException('Cannot convert value of class "' . get_class($seconds) . '" to an integer.');
            } else {
                throw new InvalidArgumentException('Cannot convert value of type "' . gettype($seconds) . '" to an integer.');
            }
        }

        $intValue = (int)(string)$seconds;

        if ((string)$intValue != (string)$seconds) {
            throw new InvalidArgumentException('Cannot convert value "'. $seconds . '" to an integer.');
        }

        $this->setValue($seconds);
    }

    public function getValue(): int
    {
        return $this->value;
    }
}

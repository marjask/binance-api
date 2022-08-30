<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use InvalidArgumentException;

class Price extends AbstractValueObject
{
    public function __construct(mixed $value)
    {
        if (!is_numeric($value) || $value <= 0) {
            throw new InvalidArgumentException('Invalid price');
        }

        $stringValue = (string)$value;

        if ($stringValue != $value) {
            throw new InvalidArgumentException('Cannot convert value "'. $value . '" to numeric.');
        }

        $this->setValue($stringValue);
    }

    public function getValue(): string
    {
        return $this->value;
    }
}

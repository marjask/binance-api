<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use InvalidArgumentException;

class Price extends AbstractValueObject
{
    public function __construct(string $value)
    {
        if (!is_numeric($value)) {
            throw new InvalidArgumentException('Invalid price');
        }

        $this->setValue($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }
}

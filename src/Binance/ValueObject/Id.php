<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use InvalidArgumentException;

class Id extends AbstractValueObject
{
    public function __construct(int $value)
    {
        if ($value < 1) {
            throw new InvalidArgumentException('Invalid ID');
        }

        $this->setValue($value);
    }

    public function getValue(): int
    {
        return $this->value;
    }
}

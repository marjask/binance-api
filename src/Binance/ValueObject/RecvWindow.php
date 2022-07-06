<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use InvalidArgumentException;

class RecvWindow extends IntVO
{
    private const MAX_VALUE = 60000;

    public function __construct(int $value)
    {
        $this->throwIfInvalidValue($value);

        parent::__construct($value);
    }

    private function throwIfInvalidValue(int $value): void
    {
        if ($value > self::MAX_VALUE) {
            throw new InvalidArgumentException('The value cannot be greater than 60000');
        }
    }
}

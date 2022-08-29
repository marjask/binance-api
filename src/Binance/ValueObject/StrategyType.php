<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use InvalidArgumentException;

class StrategyType extends Integer
{
    private const MAX_VALUE = 1000000;

    public function __construct(int $seconds)
    {
        if ($seconds >= self::MAX_VALUE) {
            throw new InvalidArgumentException('The value cannot be greater than 60000');
        }

        parent::__construct($seconds);
    }
}

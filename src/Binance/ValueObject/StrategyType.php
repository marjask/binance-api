<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use InvalidArgumentException;

class StrategyType extends Integer
{
    private const MAX_VALUE = 1000000;

    public function __construct(int $value)
    {
        if ($value > self::MAX_VALUE) {
            throw new InvalidArgumentException(
                sprintf(
                    'The value cannot be greater than %s.',
                    self::MAX_VALUE
                )
            );
        }

        parent::__construct($value);
    }
}

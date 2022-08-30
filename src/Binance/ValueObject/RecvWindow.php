<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use InvalidArgumentException;

class RecvWindow extends Integer
{
    private const MIN_VALUE = 0;
    private const MAX_VALUE = 60000;

    public function __construct(int $value)
    {
        if ($value <= self::MIN_VALUE || $value > self::MAX_VALUE) {
            throw new InvalidArgumentException(
                sprintf(
                    'The value cannot be less than %d and greater than %d.',
                    self::MIN_VALUE,
                    self::MAX_VALUE
                )
            );
        }

        parent::__construct($value);
    }
}

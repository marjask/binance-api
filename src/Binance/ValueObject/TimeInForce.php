<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use Binance\ApiConst;
use InvalidArgumentException;

final class TimeInForce extends Text
{
    public const TIME_IN_FORCE_GTC = 'GTC';

    public const TIME_IN_FORCE_LIST = [
        self::TIME_IN_FORCE_GTC,
    ];

    public function __construct(string $value)
    {
        $this->throwIfNotValid($value);

        parent::__construct($value);
    }

    private function throwIfNotValid(string $value)
    {
        if (!in_array($value, self::TIME_IN_FORCE_LIST, true)) {
            throw new InvalidArgumentException('Invalid timeInForce value');
        }
    }
}

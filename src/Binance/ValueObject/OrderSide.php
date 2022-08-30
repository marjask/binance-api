<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use Binance\ApiConst;
use InvalidArgumentException;

class OrderSide extends AbstractValueObject
{
    public const ORDER_SIDE_BUY = 'BUY';
    public const ORDER_SIDE_SELL = 'SELL';

    public const ORDER_SIDES = [
        self::ORDER_SIDE_BUY,
        self::ORDER_SIDE_SELL,
    ];

    public function __construct(string $value)
    {
        if (!in_array($value, self::ORDER_SIDES, true)) {
            throw new InvalidArgumentException(sprintf('Invalid order side %s', $value));
        }

        $this->setValue($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }
}

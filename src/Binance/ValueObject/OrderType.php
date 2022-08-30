<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use Binance\ApiConst;
use InvalidArgumentException;

class OrderType extends AbstractValueObject
{
    public const ORDER_TYPE_LIMIT = 'LIMIT';
    public const ORDER_TYPE_MARKET = 'MARKET';
    public const ORDER_TYPE_STOP_LOSS = 'STOP_LOSS';
    public const ORDER_TYPE_STOP_LOSS_LIMIT = 'STOP_LOSS_LIMIT';
    public const ORDER_TYPE_TAKE_PROFIT = 'TAKE_PROFIT';
    public const ORDER_TYPE_TAKE_PROFIT_LIMIT = 'TAKE_PROFIT_LIMIT';
    public const ORDER_TYPE_LIMIT_MARKET = 'LIMIT_MAKER';

    public const ORDER_TYPES = [
        self::ORDER_TYPE_LIMIT,
        self::ORDER_TYPE_MARKET,
        self::ORDER_TYPE_STOP_LOSS,
        self::ORDER_TYPE_STOP_LOSS_LIMIT,
        self::ORDER_TYPE_TAKE_PROFIT,
        self::ORDER_TYPE_TAKE_PROFIT_LIMIT,
        self::ORDER_TYPE_LIMIT_MARKET,
    ];

    public function __construct(string $value)
    {
        if (!in_array($value, self::ORDER_TYPES, true)) {
            throw new InvalidArgumentException(sprintf('Invalid stop price value %s', $value));
        }

        $this->setValue($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }
}

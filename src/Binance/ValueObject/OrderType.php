<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use Binance\ApiConst;
use InvalidArgumentException;

class OrderType extends AbstractValueObject
{
    public const LIMIT = 'LIMIT';
    public const MARKET = 'MARKET';
    public const STOP_LOSS = 'STOP_LOSS';
    public const STOP_LOSS_LIMIT = 'STOP_LOSS_LIMIT';
    public const TAKE_PROFIT = 'TAKE_PROFIT';
    public const TAKE_PROFIT_LIMIT = 'TAKE_PROFIT_LIMIT';
    public const LIMIT_MAKER = 'LIMIT_MAKER';

    public const TYPES = [
        self::LIMIT,
        self::MARKET,
        self::STOP_LOSS,
        self::STOP_LOSS_LIMIT,
        self::TAKE_PROFIT,
        self::TAKE_PROFIT_LIMIT,
        self::LIMIT_MAKER,
    ];

    public static function fromString(string $value): self
    {
        return new self(strtoupper($value));
    }

    public function __construct(string $value)
    {
        if (!in_array($value, self::TYPES, true)) {
            throw new InvalidArgumentException(sprintf('Invalid stop price value %s', $value));
        }

        $this->setValue($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }
}

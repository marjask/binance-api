<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use InvalidArgumentException;

final class Interval extends Text
{
    public const S1 = '1s'; // 1 second
    public const M1 = '1m'; // 1 minute
    public const M3 = '3m'; // 3 minutes
    public const M5 = '5m'; // 5 minutes
    public const M15 = '15m'; // 15 minutes
    public const M30 = '30m'; // 30 minutes
    public const H1 = '1h'; // 1 hour
    public const H2 = '2h'; // 2 hours
    public const H4 = '4h'; // 4 hours
    public const H6 = '6h'; // 6 hours
    public const H8 = '8h'; // 8 hours
    public const H12 = '12h'; // 12 hours
    public const D1 = '1d'; // 1 day
    public const D3 = '3d'; // 3 days
    public const W1 = '1w'; // 1 week
    public const MN = '1M'; // 1 month

    public const LIST = [
        self::S1,
        self::M1,
        self::M3,
        self::M5,
        self::M15,
        self::M30,
        self::H1,
        self::H2,
        self::H4,
        self::H6,
        self::H8,
        self::H12,
        self::D1,
        self::D3,
        self::W1,
        self::MN,
    ];

    public static function fromString(string $value): self
    {
        return new self($value);
    }

    public function __construct(string $value)
    {
        $this->throwIfNotValid($value);

        parent::__construct($value);
    }

    private function throwIfNotValid(string $value): void
    {
        if (!in_array($value, self::LIST, true)) {
            throw new InvalidArgumentException('Invalid timeInForce value');
        }
    }
}

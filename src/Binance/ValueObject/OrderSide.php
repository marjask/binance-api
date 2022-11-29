<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use Binance\ApiConst;
use InvalidArgumentException;

class OrderSide extends AbstractValueObject
{
    public const BUY = 'BUY';
    public const SELL = 'SELL';

    public const SIDES = [
        self::BUY,
        self::SELL,
    ];

    public static function fromString(string $value): self
    {
        return new self(strtoupper($value));
    }

    public function __construct(string $value)
    {
        if (!in_array($value, self::SIDES, true)) {
            throw new InvalidArgumentException(sprintf('Invalid order side %s', $value));
        }

        $this->setValue($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }
}

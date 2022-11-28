<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use Binance\ApiConst;
use InvalidArgumentException;

final class OrderRespType extends AbstractValueObject
{
    public const ACK = 'ACK';
    public const RESULT = 'RESULT';
    public const FULL = 'FULL';

    public const TYPES = [
        self::ACK,
        self::RESULT,
        self::FULL,
    ];

    public static function fromString(string $value): self
    {
        return new self(strtoupper($value));
    }

    public function __construct(string $value)
    {
        if (!in_array($value, self::TYPES, true)) {
            throw new InvalidArgumentException(sprintf('Invalid order resp type %s', $value));
        }

        $this->setValue($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }
}

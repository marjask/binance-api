<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use InvalidArgumentException;

final class TimeInForce extends Text
{
    public const GTC = 'GTC'; // Good Til Canceled
    public const IOC = 'IOC'; // Immediate Or Cancel
    public const FOK = 'FOK'; // Fill or Kill

    public const LIST = [
        self::GTC,
        self::IOC,
        self::FOK,
    ];

    public static function fromString(string $value): self
    {
        return new self(strtoupper($value));
    }

    public function __construct(string $value)
    {
        $this->throwIfNotValid($value);

        parent::__construct($value);
    }

    private function throwIfNotValid(string $value)
    {
        if (!in_array($value, self::LIST, true)) {
            throw new InvalidArgumentException('Invalid timeInForce value');
        }
    }
}

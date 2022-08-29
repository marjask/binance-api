<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use InvalidArgumentException;

final class Symbol extends AbstractValueObject
{
    public function __construct(string $symbol)
    {
        if (!preg_match('#^[A-Z0-9-_.]{1,20}$#', $symbol)) {
            throw new InvalidArgumentException('Illegal characters found.');
        }

        $this->setValue($symbol);
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public static function fromString(string $symbol): self
    {
        try {
            return new self($symbol);
        } catch (InvalidArgumentException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }
}

<?php

declare(strict_types=1);

namespace Binance\ValueObject;

class BooleanValueObject extends AbstractValueObject
{
    public function __construct(bool $value)
    {
        $this->setValue($value);
    }

    public function toBoolean(): bool
    {
        return $this->getValue();
    }

    public function toString(): string
    {
        return $this->toBoolean() === true ? 'true' : 'false';
    }

    public function getValue(): bool
    {
        return $this->value;
    }
}

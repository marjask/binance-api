<?php

declare(strict_types=1);

namespace Binance\ValueObject;

abstract class AbstractValueObject
{
    protected mixed $value;

    abstract public function getValue();

    public function toString(): string
    {
        return (string)$this->getValue();
    }

    public function setValue(mixed $value): static
    {
        $this->value = $value;

        return $this;
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}

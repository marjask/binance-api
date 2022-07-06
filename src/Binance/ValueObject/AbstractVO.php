<?php

declare(strict_types=1);

namespace Binance\ValueObject;

abstract class AbstractVO
{
    private mixed $value;

    public function toString(): string
    {
        return (string)$this->getValue();
    }

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function setValue(mixed $value): self
    {
        $this->value = $value;

        return $this;
    }
}

<?php

declare(strict_types=1);

namespace Binance\ValueObject;

class Text extends AbstractValueObject
{
    public function __construct(string $value)
    {
        $this->setValue($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }
}

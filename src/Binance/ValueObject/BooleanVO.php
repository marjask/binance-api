<?php

declare(strict_types=1);

namespace Binance\ValueObject;

class BooleanVO extends AbstractVO
{
    public function __construct(bool $value)
    {
        $this->setValue($value);
    }

    public function toBoolean(): bool
    {
        return (bool)$this->getValue();
    }
}

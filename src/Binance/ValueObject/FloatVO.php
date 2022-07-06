<?php

declare(strict_types=1);

namespace Binance\ValueObject;

class FloatVO extends AbstractVO
{
    public function __construct(float $value)
    {
        $this->setValue($value);
    }
}

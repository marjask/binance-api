<?php

declare(strict_types=1);

namespace Binance\ValueObject;

class Price extends AbstractVO
{
    public function __construct(string $value)
    {
        $this->setValue($value);
    }
}

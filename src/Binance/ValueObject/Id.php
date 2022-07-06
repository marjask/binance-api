<?php

declare(strict_types=1);

namespace Binance\ValueObject;

class Id extends AbstractVO
{
    public function __construct(int $value)
    {
        $this->setValue($value);
    }
}

<?php

declare(strict_types=1);

namespace Binance\ValueObject;

class IntVO extends AbstractVO
{
    public function __construct(int $value)
    {
        $this->setValue($value);
    }
}

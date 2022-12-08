<?php

declare(strict_types=1);

namespace Test\Binance\Collection\ProviderData;

use Binance\ValueObject\AbstractValueObject;

final class TestVO extends AbstractValueObject
{
    public function __construct(mixed $value)
    {
        $this->setValue($value);
    }

    public function getValue(): mixed
    {
        return $this->value;
    }
}

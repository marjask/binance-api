<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use Binance\ApiConst;
use InvalidArgumentException;

final class TimeInForce extends AbstractVO
{
    private const LIST = ApiConst::TIME_IN_FORCE_LIST;

    public function __construct(string $value)
    {
        $this->throwIfNotValid($value);

        $this->setValue($value);
    }

    private function throwIfNotValid(string $value)
    {
        if (!in_array($value, self::LIST)) {
            throw new InvalidArgumentException('Invalid value');
        }
    }
}

<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use Binance\ApiConst;
use InvalidArgumentException;

class OrderType extends AbstractVO
{
    private const LIST = ApiConst::ORDER_TYPES;

    public function __construct(string $value)
    {
        if (!in_array($value, self::LIST)) {
            throw new InvalidArgumentException(sprintf('Invalid stop price value %s', $value));
        }

        $this->setValue($value);
    }
}

<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use Binance\ApiConst;
use InvalidArgumentException;

class OrderSide extends AbstractVO
{
    private const LIST = ApiConst::ORDER_SIDES;

    public function __construct(string $value)
    {
        if (!in_array($value, self::LIST)) {
            throw new InvalidArgumentException(sprintf('Invalid order side %s', $value));
        }

        $this->setValue($value);
    }
}

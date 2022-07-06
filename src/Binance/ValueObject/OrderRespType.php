<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use Binance\ApiConst;
use InvalidArgumentException;

final class OrderRespType extends AbstractVO
{
    private const LIST = ApiConst::ORDER_RESP_TYPES;

    public function __construct(string $value)
    {
        if (!in_array($value, self::LIST)) {
            throw new InvalidArgumentException(sprintf('Invalid order resp type %s', $value));
        }

        $this->setValue($value);
    }
}

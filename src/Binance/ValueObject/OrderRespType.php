<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use Binance\ApiConst;
use InvalidArgumentException;

final class OrderRespType extends AbstractValueObject
{
    public const ORDER_RESP_TYPE_ACK = 'ACK';
    public const ORDER_RESP_TYPE_RESULT = 'RESULT';
    public const ORDER_RESP_TYPE_FULL = 'FULL';

    public const ORDER_RESP_TYPES = [
        self::ORDER_RESP_TYPE_ACK,
        self::ORDER_RESP_TYPE_RESULT,
        self::ORDER_RESP_TYPE_FULL,
    ];

    public function __construct(string $value)
    {
        if (!in_array($value, self::ORDER_RESP_TYPES)) {
            throw new InvalidArgumentException(sprintf('Invalid order resp type %s', $value));
        }

        $this->setValue($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }
}

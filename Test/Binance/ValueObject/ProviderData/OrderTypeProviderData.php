<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject\ProviderData;

use Generator;

final class OrderTypeProviderData
{
    public static function validProviderData(): Generator
    {
        yield [
            'value' => 'LIMIT'
        ];
        yield [
            'value' => 'MARKET'
        ];
        yield [
            'value' => 'STOP_LOSS'
        ];
        yield [
            'value' => 'STOP_LOSS_LIMIT'
        ];
        yield [
            'value' => 'TAKE_PROFIT'
        ];
        yield [
            'value' => 'TAKE_PROFIT_LIMIT'
        ];
        yield [
            'value' => 'LIMIT_MAKER'
        ];
    }

    public static function invalidProviderData(): Generator
    {
        yield [
            'value' => 'abc'
        ];
        yield [
            'value' => 'true'
        ];
        yield [
            'value' => 'limit'
        ];
    }

    public static function invalidTypeProviderData(): Generator
    {
        yield [
            'value' => 1
        ];
        yield [
            'value' => null
        ];
        yield [
            'value' => 0.1
        ];
        yield [
            'value' => (object) []
        ];
        yield [
            'value' => -121
        ];
        yield [
            'value' => true
        ];
    }
}

<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject\ProviderData;

use Generator;

final class TimeInForceProviderData
{
    public static function validProviderData(): Generator
    {
        yield [
            'value' => 'GTC'
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

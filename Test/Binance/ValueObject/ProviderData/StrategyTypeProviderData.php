<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject\ProviderData;

use Generator;

final class StrategyTypeProviderData
{
    public static function validProviderData(): Generator
    {
        yield [
            'value' => 1
        ];
        yield [
            'value' => 41238
        ];
        yield [
            'value' => 1000000
        ];
    }

    public static function invalidProviderData(): Generator
    {
        yield [
            'value' => 1000001
        ];
    }

    public static function invalidTypeProviderData(): Generator
    {
        yield [
            'value' => (object) ['test' => 1]
        ];
        yield [
            'value' => true
        ];
        yield [
            'value' => 123.12
        ];
        yield [
            'value' => 'abc'
        ];
        yield [
            'value' => null
        ];
        yield [
            'value' => 'true'
        ];
    }
}

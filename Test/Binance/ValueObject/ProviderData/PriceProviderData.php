<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject\ProviderData;

use Generator;

final class PriceProviderData
{
    public static function validProviderData(): Generator
    {
        yield [
            'value' => 1
        ];
        yield [
            'value' => 123.12
        ];
        yield [
            'value' => '41238'
        ];
    }

    public static function invalidProviderData(): Generator
    {
        yield [
            'value' => (object) ['test' => 1]
        ];
        yield [
            'value' => true
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
        yield [
            'value' => -12
        ];
    }
}

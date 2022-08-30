<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject\ProviderData;

use Generator;

final class IdProviderData
{
    public static function validProviderData(): Generator
    {
        yield [
            'value' => 1
        ];
        yield [
            'value' => 41238
        ];
    }

    public static function invalidProviderData(): Generator
    {
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
        yield [
            'value' => '9898090'
        ];
    }

    public static function invalidNegativeDataProviderData(): Generator
    {
        yield [
            'value' => -1
        ];
        yield [
            'value' => -1123123
        ];
    }
}

<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject\ProviderData;

use Generator;

final class BooleanProviderData
{
    public static function validProviderData(): Generator
    {
        yield [
            'value' => true
        ];
        yield [
            'value' => false
        ];
    }

    public static function invalidProviderData(): Generator
    {
        yield [
            'value' => 0
        ];
        yield [
            'value' => 1
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
            'value' => 'false'
        ];
    }
}

<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject\ProviderData;

use Generator;

final class RealProviderData
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
        yield [
            'value' => '41238.098'
        ];
        yield [
            'value' => '-989'
        ];
        yield [
            'value' => '98,98'
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
            'value' => 'tte123'
        ];
    }
}

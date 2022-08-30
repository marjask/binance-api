<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject\ProviderData;

use Generator;

final class SymbolProviderData
{
    public static function validProviderData(): Generator
    {
        yield [
            'value' => 'BTCUSD'
        ];
        yield [
            'value' => 'BTCUSDT'
        ];
        yield [
            'value' => 'XRPUSDT'
        ];
        yield [
            'value' => 'PHPUNIT_24COIN'
        ];
        yield [
            'value' => 'PHPUNIT24.COIN'
        ];
    }

    public static function invalidProviderData(): Generator
    {
        yield [
            'value' => 'btcusd'
        ];
        yield [
            'value' => 'btc_usd'
        ];
        yield [
            'value' => 'btc.usd'
        ];
        yield [
            'value' => '---bac-12'
        ];
    }

    public static function invalidTypeProviderData(): Generator
    {
        yield [
            'value' => 1000001
        ];
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
            'value' => null
        ];
    }
}

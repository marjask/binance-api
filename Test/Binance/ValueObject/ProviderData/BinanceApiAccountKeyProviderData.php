<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject\ProviderData;

use Generator;

final class BinanceApiAccountKeyProviderData
{
    public static function validProviderData(): Generator
    {
        yield [
            'apiKey' => 'test',
            'secretKey' => 'test',
        ];
    }

    public static function invalidProviderData(): Generator
    {
        yield [
            'apiKey' => 123,
            'secretKey' => 123,
        ];
        yield [
            'apiKey' => null,
            'secretKey' => null,
        ];
        yield [
            'apiKey' => true,
            'secretKey' => false,
        ];
    }
}

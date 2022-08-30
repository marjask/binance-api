<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject\ProviderData;

use Generator;

final class OrderRespTypeProviderData
{
    public static function validProviderData(): Generator
    {
        yield [
            'value' => 'ACK'
        ];
        yield [
            'value' => 'RESULT'
        ];
        yield [
            'value' => 'FULL'
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
}

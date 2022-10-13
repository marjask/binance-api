<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ProviderData;

use Generator;

final class TradeDTOProviderData
{
    public static function data(): Generator
    {
        yield [
            'id' => 1,
            'price' => '1.123',
            'qty' => '10.12',
            'quoteQty' => '8.91',
            'time' => 123123123123,
            'isBuyerMaker' => false,
            'isBestMatch' => true,
        ];
    }
}

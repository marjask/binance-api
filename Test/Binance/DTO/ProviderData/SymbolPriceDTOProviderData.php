<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ProviderData;

use Generator;

final class SymbolPriceDTOProviderData
{
    public static function data(): Generator
    {
        yield [
            'symbol' => 'ETHUSDT',
            'price' => '1.123',
        ];
    }
}

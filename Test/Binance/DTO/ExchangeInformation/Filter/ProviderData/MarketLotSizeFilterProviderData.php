<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ExchangeInformation\Filter\ProviderData;

use Generator;

final class MarketLotSizeFilterProviderData
{
    public static function data(): Generator
    {
        yield [
            'filterType' => 'MARKET_LOT_SIZE',
            'minQty' => '0.01',
            'maxQty' => '1000.00',
            'stepSize' => '0.0001000',
        ];
    }

    public static function invalidData(): Generator
    {
        yield [
            'filterType' => 'TEST',
            'minQty' => '0.01',
            'maxQty' => '1000.00',
            'stepSize' => '0.0001000',
        ];
    }
}

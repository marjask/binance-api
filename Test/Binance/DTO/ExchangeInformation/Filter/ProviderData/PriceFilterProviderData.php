<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ExchangeInformation\Filter\ProviderData;

use Generator;

final class PriceFilterProviderData
{
    public static function data(): Generator
    {
        yield [
            'filterType' => 'PRICE_FILTER',
            'minPrice' => '0.1',
            'maxPrice' => '1000.0',
            'tickSize' => '0.001',
        ];
    }

    public static function invalidData(): Generator
    {
        yield [
            'filterType' => 'TEST',
            'minPrice' => '0.1',
            'maxPrice' => '1000.0',
            'tickSize' => '0.001',
        ];
    }
}

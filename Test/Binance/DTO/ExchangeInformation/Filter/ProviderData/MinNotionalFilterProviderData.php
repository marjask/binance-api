<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ExchangeInformation\Filter\ProviderData;

use Generator;

final class MinNotionalFilterProviderData
{
    public static function data(): Generator
    {
        yield [
            'filterType' => 'MIN_NOTIONAL',
            'minNotional' => '20.000',
            'applyToMarket' => true,
            'avgPriceMins' => 1,
        ];
    }

    public static function invalidData(): Generator
    {
        yield [
            'filterType' => 'TEST',
            'minNotional' => '20.000',
            'applyToMarket' => true,
            'avgPriceMins' => 1,
        ];
    }
}

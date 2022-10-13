<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ExchangeInformation\Filter\ProviderData;

use Generator;

final class PercentPriceFilterProviderData
{
    public static function data(): Generator
    {
        yield [
            'filterType' => 'PERCENT_PRICE',
            'multiplierUp' => '5',
            'multiplierDown' => '5',
            'avgPriceMins' => 1,
        ];
    }

    public static function invalidData(): Generator
    {
        yield [
            'filterType' => 'TEST',
            'multiplierUp' => '5',
            'multiplierDown' => '5',
            'avgPriceMins' => 1,
        ];
    }
}

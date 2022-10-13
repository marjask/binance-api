<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ExchangeInformation\Filter\Factory\ProviderData;

use Binance\DTO\ExchangeInformation\Filter\IcebergPartsFilter;
use Binance\DTO\ExchangeInformation\Filter\LotSizeFilter;
use Binance\DTO\ExchangeInformation\Filter\MarketLotSizeFilter;
use Binance\DTO\ExchangeInformation\Filter\MaxNumAlgoOrdersFilter;
use Binance\DTO\ExchangeInformation\Filter\MaxNumOrdersFilter;
use Binance\DTO\ExchangeInformation\Filter\MinNotionalFilter;
use Binance\DTO\ExchangeInformation\Filter\PercentPriceFilter;
use Binance\DTO\ExchangeInformation\Filter\PriceFilter;
use Binance\DTO\ExchangeInformation\Filter\TrailingDeltaFilter;
use Generator;

final class FilterFactoryProviderData
{
    public static function dataToCreateFilter(): Generator
    {
        yield [
            'data' => [
                'filterType' => 'TRAILING_DELTA',
                'minTrailingAboveDelta' => 1,
                'maxTrailingAboveDelta' => 2,
                'minTrailingBelowDelta' => 3,
                'maxTrailingBelowDelta' => 4,
            ],
            'expectedFilter' => TrailingDeltaFilter::class,
        ];
        yield [
            'data' => [
                'filterType' => 'PRICE_FILTER',
                'minPrice' => '0.1',
                'maxPrice' => '1000.0',
                'tickSize' => '0.001',
            ],
            'expectedFilter' => PriceFilter::class,
        ];
        yield [
            'data' => [
                'filterType' => 'PERCENT_PRICE',
                'multiplierUp' => '5',
                'multiplierDown' => '5',
                'avgPriceMins' => 1,
            ],
            'expectedFilter' => PercentPriceFilter::class,
        ];
        yield [
            'data' => [
                'filterType' => 'MIN_NOTIONAL',
                'minNotional' => '20.000',
                'applyToMarket' => true,
                'avgPriceMins' => 1,
            ],
            'expectedFilter' => MinNotionalFilter::class,
        ];
        yield [
            'data' => [
                'filterType' => 'MAX_NUM_ORDERS',
                'maxNumOrders' => 100,
            ],
            'expectedFilter' => MaxNumOrdersFilter::class,
        ];
        yield [
            'data' => [
                'filterType' => 'MAX_NUM_ALGO_ORDERS',
                'maxNumAlgoOrders' => 100,
            ],
            'expectedFilter' => MaxNumAlgoOrdersFilter::class,
        ];
        yield [
            'data' => [
                'filterType' => 'MARKET_LOT_SIZE',
                'minQty' => '0.01',
                'maxQty' => '1000.00',
                'stepSize' => '0.0001000',
            ],
            'expectedFilter' => MarketLotSizeFilter::class,
        ];
        yield [
            'data' => [
                'filterType' => 'LOT_SIZE',
                'minQty' => '0.01',
                'maxQty' => '1000.00',
                'stepSize' => '0.0001000',
            ],
            'expectedFilter' => LotSizeFilter::class,
        ];
        yield [
            'data' => [
                'filterType' => 'ICEBERG_PARTS',
                'limit' => 12,
            ],
            'expectedFilter' => IcebergPartsFilter::class,
        ];
    }

    public static function dataToEmptyFilterType(): Generator
    {
        yield [
            'data' => [
                'limit' => 12,
            ],
        ];
    }

    public static function dataInvalidFilterType(): Generator
    {
        yield [
            'data' => [
                'filterType' => 'TEST',
                'limit' => 12,
            ],
        ];
    }

    public static function dataToCreateTrailingDeltaFilter(): Generator
    {
        yield [
            'data' => [
                'filterType' => 'TRAILING_DELTA',
                'minTrailingAboveDelta' => 1,
                'maxTrailingAboveDelta' => 2,
                'minTrailingBelowDelta' => 3,
                'maxTrailingBelowDelta' => 4,
            ],
            'expectedFilter' => TrailingDeltaFilter::class,
            'expectedMinTrailingAboveDelta' => 1,
            'expectedMaxTrailingAboveDelta' => 2,
            'expectedMinTrailingBelowDelta' => 3,
            'expectedMaxTrailingBelowDelta' => 4,
        ];
    }

    public static function dataToCreatePriceFilter(): Generator
    {
        yield [
            'data' => [
                'filterType' => 'PRICE_FILTER',
                'minPrice' => '0.1',
                'maxPrice' => '1000.0',
                'tickSize' => '0.001',
            ],
            'expectedFilter' => PriceFilter::class,
            'expectedMinPrice' => '0.1',
            'expectedMaxPrice' => '1000.0',
            'expectedTickSize' => '0.001',
        ];
    }

    public static function dataToCreatePercentPriceFilter(): Generator
    {
        yield [
            'data' => [
                'filterType' => 'PERCENT_PRICE',
                'multiplierUp' => '5',
                'multiplierDown' => '5',
                'avgPriceMins' => 1,
            ],
            'expectedFilter' => PercentPriceFilter::class,
            'expectedMultiplierUp' => '5',
            'expectedMultiplierDown' => '5',
            'expectedAvgPriceMins' => 1,
        ];
    }

    public static function dataToCreateMinNotionalFilter(): Generator
    {
        yield [
            'data' => [
                'filterType' => 'MIN_NOTIONAL',
                'minNotional' => '20.000',
                'applyToMarket' => true,
                'avgPriceMins' => 1,
            ],
            'expectedFilter' => MinNotionalFilter::class,
            'expectedMinNotional' => '20.000',
            'expectedApplyToMarket' => true,
            'expectedAvgPriceMins' => 1,
        ];
    }

    public static function dataToCreateMaxNumOrdersFilter(): Generator
    {
        yield [
            'data' => [
                'filterType' => 'MAX_NUM_ORDERS',
                'maxNumOrders' => 100,
            ],
            'expectedFilter' => MaxNumOrdersFilter::class,
            'expectedMaxNumOrders' => 100,
        ];
    }

    public static function dataToCreateMaxNumAlgoOrdersFilter(): Generator
    {
        yield [
            'data' => [
                'filterType' => 'MAX_NUM_ALGO_ORDERS',
                'maxNumAlgoOrders' => 100,
            ],
            'expectedFilter' => MaxNumAlgoOrdersFilter::class,
            'maxNumAlgoOrders' => 100,
        ];
    }

    public static function dataToCreateMarketLotSizeFilter(): Generator
    {
        yield [
            'data' => [
                'filterType' => 'MARKET_LOT_SIZE',
                'minQty' => '0.01',
                'maxQty' => '1000.00',
                'stepSize' => '0.0001000',
            ],
            'expectedFilter' => MarketLotSizeFilter::class,
            'expectedMinQty' => '0.01',
            'expectedMaxQty' => '1000.00',
            'expectedStepSize' => '0.0001000',
        ];
    }

    public static function dataToCreateLotSizeFilter(): Generator
    {
        yield [
            'data' => [
                'filterType' => 'LOT_SIZE',
                'minQty' => '0.01',
                'maxQty' => '1000.00',
                'stepSize' => '0.0001000',
            ],
            'expectedFilter' => LotSizeFilter::class,
            'expectedMinQty' => '0.01',
            'expectedMaxQty' => '1000.00',
            'expectedStepSize' => '0.0001000',
        ];
    }

    public static function dataToCreateIcebergPartsFilter(): Generator
    {
        yield [
            'data' => [
                'filterType' => 'ICEBERG_PARTS',
                'limit' => 12,
            ],
            'expectedFilter' => IcebergPartsFilter::class,
            'expectedLimit' => 12,
        ];
    }
}

<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ExchangeInformation\ProviderData;

use Binance\Collection\OrderTypeCollection;
use Binance\DTO\ExchangeInformation\Filter\Factory\FilterFactory;
use Binance\DTO\ExchangeInformation\Filter\FilterCollection;
use Generator;

final class ExhangeInformationDTOProviderData
{
    public static function data(): Generator
    {
        yield [
            'symbol' => 'XRPUSDT',
            'status' => 'TRADING',
            'baseAsset' => 'XRP',
            'baseAssetPrecision' => 8,
            'quoteAsset' => 'USDT',
            'quotePrecision' => 8,
            'quoteAssetPrecision' => 8,
            'baseCommissionPrecision' => 8,
            'quoteCommissionPrecision' => 8,
            'orderTypes' => OrderTypeCollection::createFromStringArray([
                'LIMIT',
                'LIMIT_MAKER',
                'MARKET',
                'STOP_LOSS_LIMIT',
                'TAKE_PROFIT_LIMIT',
            ]),
            'icebergAllowed' => true,
            'ocoAllowed' => true,
            'quoteOrderQtyMarketAllowed' => true,
            'allowTrailingStop' => true,
            'cancelReplaceAllowed' => true,
            'isSpotTradingAllowed' => true,
            'isMarginTradingAllowed' => false,
            'filters' => FilterCollection::fromArray([
                FilterFactory::createFilterFromArray([
                    'filterType' => 'PRICE_FILTER',
                    'minPrice' => "0.00010000",
                    'maxPrice' => "1000.00000000",
                    'tickSize' => "0.00010000",
                ]),
                FilterFactory::createFilterFromArray([
                    'filterType' => 'PERCENT_PRICE',
                    'multiplierUp' => "5",
                    'multiplierDown' => "0.2",
                    'avgPriceMins' => 1,
                ]),
            ]),
            [
                'LIMIT',
                'LIMIT_MAKER',
                'MARKET',
                'STOP_LOSS_LIMIT',
                'TAKE_PROFIT_LIMIT',
            ],
            [
                [
                    'minPrice' => "0.00010000",
                    'maxPrice' => "1000.00000000",
                    'tickSize' => "0.00010000",
                    'filterType' => 'PRICE_FILTER',
                ],
                [
                    'multiplierUp' => "5",
                    'multiplierDown' => "0.2",
                    'avgPriceMins' => 1,
                    'filterType' => 'PERCENT_PRICE',
                ],
            ]
        ];
    }
}

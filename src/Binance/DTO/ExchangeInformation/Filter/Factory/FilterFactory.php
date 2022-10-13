<?php

declare(strict_types=1);

namespace Binance\DTO\ExchangeInformation\Filter\Factory;

use Binance\DTO\ExchangeInformation\Filter\AbstractFilter;
use Binance\DTO\ExchangeInformation\Filter\FilterCollection;
use Binance\DTO\ExchangeInformation\Filter\FilterConst;
use Binance\DTO\ExchangeInformation\Filter\IcebergPartsFilter;
use Binance\DTO\ExchangeInformation\Filter\LotSizeFilter;
use Binance\DTO\ExchangeInformation\Filter\MarketLotSizeFilter;
use Binance\DTO\ExchangeInformation\Filter\MaxNumAlgoOrdersFilter;
use Binance\DTO\ExchangeInformation\Filter\MaxNumOrdersFilter;
use Binance\DTO\ExchangeInformation\Filter\MinNotionalFilter;
use Binance\DTO\ExchangeInformation\Filter\PercentPriceFilter;
use Binance\DTO\ExchangeInformation\Filter\PriceFilter;
use Binance\DTO\ExchangeInformation\Filter\TrailingDeltaFilter;
use InvalidArgumentException;
use UnexpectedValueException;

final class FilterFactory
{
    public static function createFilterCollectionFromArray(array $data): FilterCollection
    {
        return FilterCollection::fromArray(
            array_map(static fn (array $item): AbstractFilter => self::createFilterFromArray($item), $data)
        );
    }

    public static function createFilterFromArray(array $data): AbstractFilter
    {
        if (!array_key_exists('filterType', $data)) {
            throw new InvalidArgumentException('Key filterType required.');
        }

        return match ($data['filterType']) {
            FilterConst::PRICE_FILTER => self::createPriceFilterFromArray($data),
            FilterConst::PERCENT_PRICE => self::createPercentPriceFilterFromArray($data),
            FilterConst::LOT_SIZE => self::createLotSizeFilterFromArray($data),
            FilterConst::MIN_NOTIONAL => self::createMinNotionalFilterFromArray($data),
            FilterConst::ICEBERG_PARTS => self::createIcebergPartsFilterFromArray($data),
            FilterConst::MARKET_LOT_SIZE => self::createMarketLotSizeFilterFromArray($data),
            FilterConst::TRAILING_DELTA => self::createTrailingDeltaFilterFromArray($data),
            FilterConst::MAX_NUM_ORDERS => self::createMaxNumOrdersFilterFromArray($data),
            FilterConst::MAX_NUM_ALGO_ORDERS => self::createMaxNumAlgoOrdersFilterFromArray($data),
            default => throw new UnexpectedValueException('Unexpected filterType.'),
        };
    }

    public static function createPriceFilterFromArray(array $data): PriceFilter
    {
        return new PriceFilter(
            $data['filterType'],
            $data['minPrice'],
            $data['maxPrice'],
            $data['tickSize']
        );
    }

    public static function createPercentPriceFilterFromArray(array $data): PercentPriceFilter
    {
        return new PercentPriceFilter(
            $data['filterType'],
            $data['multiplierUp'],
            $data['multiplierDown'],
            $data['avgPriceMins']
        );
    }

    public static function createLotSizeFilterFromArray(array $data): LotSizeFilter
    {
        return new LotSizeFilter(
            $data['filterType'],
            $data['minQty'],
            $data['maxQty'],
            $data['stepSize']
        );
    }

    public static function createMinNotionalFilterFromArray(array $data): MinNotionalFilter
    {
        return new MinNotionalFilter(
            $data['filterType'],
            $data['minNotional'],
            $data['applyToMarket'],
            $data['avgPriceMins']
        );
    }

    public static function createIcebergPartsFilterFromArray(array $data): IcebergPartsFilter
    {
        return new IcebergPartsFilter(
            $data['filterType'],
            $data['limit']
        );
    }

    public static function createMarketLotSizeFilterFromArray(array $data): MarketLotSizeFilter
    {
        return new MarketLotSizeFilter(
            $data['filterType'],
            $data['minQty'],
            $data['maxQty'],
            $data['stepSize']
        );
    }

    public static function createTrailingDeltaFilterFromArray(array $data): TrailingDeltaFilter
    {
        return new TrailingDeltaFilter(
            $data['filterType'],
            $data['minTrailingAboveDelta'],
            $data['maxTrailingAboveDelta'],
            $data['minTrailingBelowDelta'],
            $data['maxTrailingBelowDelta']
        );
    }

    public static function createMaxNumOrdersFilterFromArray(array $data): MaxNumOrdersFilter
    {
        return new MaxNumOrdersFilter(
            $data['filterType'],
            $data['maxNumOrders']
        );
    }

    public static function createMaxNumAlgoOrdersFilterFromArray(array $data): MaxNumAlgoOrdersFilter
    {
        return new MaxNumAlgoOrdersFilter(
            $data['filterType'],
            $data['maxNumAlgoOrders']
        );
    }
}

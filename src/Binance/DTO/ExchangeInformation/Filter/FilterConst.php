<?php

declare(strict_types=1);

namespace Binance\DTO\ExchangeInformation\Filter;

final class FilterConst
{
    public const PRICE_FILTER = 'PRICE_FILTER';
    public const PERCENT_PRICE = 'PERCENT_PRICE';
    public const LOT_SIZE = 'LOT_SIZE';
    public const MIN_NOTIONAL = 'MIN_NOTIONAL';
    public const ICEBERG_PARTS = 'ICEBERG_PARTS';
    public const MARKET_LOT_SIZE = 'MARKET_LOT_SIZE';
    public const TRAILING_DELTA = 'TRAILING_DELTA';
    public const MAX_NUM_ORDERS = 'MAX_NUM_ORDERS';
    public const MAX_NUM_ALGO_ORDERS = 'MAX_NUM_ALGO_ORDERS';
    public const PERCENT_PRICE_BY_SIDE = 'PERCENT_PRICE_BY_SIDE';
}

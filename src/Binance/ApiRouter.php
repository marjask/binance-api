<?php

declare(strict_types=1);

namespace Binance;

final class ApiRouter
{
    private const API_V3 = 'v3';

    public static function getOrderUrl(bool $isTest = false): string
    {
        return $isTest === false ? self::API_V3 . '/order' : self::getOrderUrlTest();
    }

    public static function getOrderUrlTest(): string
    {
        return self::API_V3 . '/order/test';
    }

    public static function getCancelAllOpenOrdersOnSymbolUrl(): string
    {
        return self::API_V3 . '/openOrders';
    }

    public static function getTestConnectivityUrl(): string
    {
        return self::API_V3 . '/ping';
    }

    public static function getCheckServerTimeUrl(): string
    {
        return self::API_V3 . '/time';
    }

    public static function getExchangeInformationUrl(): string
    {
        return self::API_V3 . '/exchangeInfo';
    }

    public static function getOrderBookUrl(): string
    {
        return self::API_V3 . '/depth';
    }

    public static function getRecentTradesListUrl(): string
    {
        return self::API_V3 . '/trades';
    }

    public static function getOldTradeLookupUrl(): string
    {
        return self::API_V3 . '/historicalTrades';
    }

    public static function getAggregateTradesListUrl(): string
    {
        return self::API_V3 . '/aggTrades';
    }

    public static function getCurrentAveragePriceUrl(): string
    {
        return self::API_V3 . '/avgPrice';
    }
}

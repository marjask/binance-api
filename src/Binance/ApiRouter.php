<?php

declare(strict_types=1);

namespace Binance;

final class ApiRouter
{
    private const API_V3 = 'v3';

    /**
     * @url https://binance-docs.github.io/apidocs/spot/en/#new-order-trade
     * @url https://binance-docs.github.io/apidocs/spot/en/#cancel-order-trade
     * @url https://binance-docs.github.io/apidocs/spot/en/#query-order-user_data
     */
    public static function getOrderUrl(bool $isTest = false): string
    {
        return $isTest === false ? self::API_V3 . '/order' : self::getOrderTestUrl();
    }

    /**
     * @url https://binance-docs.github.io/apidocs/spot/en/#test-new-order-trade
     */
    public static function getOrderTestUrl(): string
    {
        return self::API_V3 . '/order/test';
    }

    /**
     * @url https://binance-docs.github.io/apidocs/spot/en/#cancel-all-open-orders-on-a-symbol-trade
     * @url https://binance-docs.github.io/apidocs/spot/en/#current-open-orders-user_data
     */
    public static function getCurrentOpenOrdersUrl(): string
    {
        return self::API_V3 . '/openOrders';
    }

    /**
     * @url https://binance-docs.github.io/apidocs/spot/en/#all-orders-user_data
     */
    public static function getAllOrdersUrl(): string
    {
        return self::API_V3 . '/allOrders';
    }

    /**
     * @url https://binance-docs.github.io/apidocs/spot/en/#test-connectivity
     */
    public static function getTestConnectivityUrl(): string
    {
        return self::API_V3 . '/ping';
    }

    /**
     * @url https://binance-docs.github.io/apidocs/spot/en/#check-server-time
     */
    public static function getCheckServerTimeUrl(): string
    {
        return self::API_V3 . '/time';
    }

    /**
     * @url https://binance-docs.github.io/apidocs/spot/en/#exchange-information
     */
    public static function getExchangeInformationUrl(): string
    {
        return self::API_V3 . '/exchangeInfo';
    }

    /**
     * @url https://binance-docs.github.io/apidocs/spot/en/#recent-trades-list
     */
    public static function getRecentTradesListUrl(): string
    {
        return self::API_V3 . '/trades';
    }

    /**
     * @url https://binance-docs.github.io/apidocs/spot/en/#old-trade-lookup-market_data
     */
    public static function getOldTradeLookupUrl(): string
    {
        return self::API_V3 . '/historicalTrades';
    }

    /**
     * @url https://binance-docs.github.io/apidocs/spot/en/#account-information-user_data
     */
    public static function getAccountInformationUrl(): string
    {
        return self::API_V3 . '/account';
    }

    /**
     * @url https://binance-docs.github.io/apidocs/spot/en/#account-trade-list-user_data
     */
    public static function getAccountTradeListUrl(): string
    {
        return self::API_V3 . '/myTrades';
    }

    /**
     * @url https://binance-docs.github.io/apidocs/spot/en/#query-current-order-count-usage-trade
     */
    public static function getCurrentOrderCountUsageUrl(): string
    {
        return self::API_V3 . '/rateLimit/order';
    }
}

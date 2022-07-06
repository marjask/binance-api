<?php

declare(strict_types=1);

namespace Binance;

final class ApiConst
{
    public const API_URL = 'https://api.binance.com/api/'; // /< REST endpoint for the currency exchange
    public const API_URL_TESTNET = 'https://testnet.binance.vision/api/'; // /< Testnet REST endpoint for the currency exchange

    // Side
    public const ORDER_SIDE_BUY = 'BUY';
    public const ORDER_SIDE_SELL = 'SELL';

    public const ORDER_SIDES = [
        self::ORDER_SIDE_BUY,
        self::ORDER_SIDE_SELL,
    ];

    // Order type
    public const ORDER_TYPE_LIMIT = 'LIMIT';
    public const ORDER_TYPE_MARKET = 'MARKET';
    public const ORDER_TYPE_STOP_LOSS = 'STOP_LOSS';
    public const ORDER_TYPE_STOP_LOSS_LIMIT = 'STOP_LOSS_LIMIT';
    public const ORDER_TYPE_TAKE_PROFIT = 'TAKE_PROFIT';
    public const ORDER_TYPE_TAKE_PROFIT_LIMIT = 'TAKE_PROFIT_LIMIT';
    public const ORDER_TYPE_LIMIT_MARKET = 'LIMIT_MAKER';

    public const ORDER_TYPES = [
        self::ORDER_TYPE_LIMIT,
        self::ORDER_TYPE_MARKET,
        self::ORDER_TYPE_STOP_LOSS,
        self::ORDER_TYPE_STOP_LOSS_LIMIT,
        self::ORDER_TYPE_TAKE_PROFIT,
        self::ORDER_TYPE_TAKE_PROFIT_LIMIT,
        self::ORDER_TYPE_LIMIT_MARKET,
    ];

    public const TIME_IN_FORCE_GTC = 'GTC';

    public const TIME_IN_FORCE_LIST = [
        self::TIME_IN_FORCE_GTC,
    ];

    public const ORDER_URL = 'v3/order';
    public const ORDER_TEST_URL = 'v3/order/test';

    public const ORDER_RESP_TYPE_ACK = 'ACK';
    public const ORDER_RESP_TYPE_RESULT = 'RESULT';
    public const ORDER_RESP_TYPE_FULL = 'FULL';

    public const ORDER_RESP_TYPES = [
        self::ORDER_RESP_TYPE_ACK,
        self::ORDER_RESP_TYPE_RESULT,
        self::ORDER_RESP_TYPE_FULL,
    ];

    public const ALGORITHM = 'sha256';
}

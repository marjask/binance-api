<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ProviderData;

use Generator;

final class OrderDTOProviderData
{
    public static function data(): Generator
    {
        yield [
            'symbol' => 'ETHUSDT',
            'orderId' => 123123,
            'orderListId' => 123123123123,
            'clientOrderId' => '12da12d',
            'price' => '112.12312',
            'origQty' => '123.01',
            'executedQty' => '120.12',
            'cummulativeQuoteQty' => '123',
            'status' => 'NEW',
            'timeInForce' => 'GTC',
            'type' => 'MARKET',
            'side' => 'BUY',
            'stopPrice' => '12.12',
            'icebergQty' => '0.0',
            'time' => 123123123123123,
            'updateTime' => 12312314131,
            'isWorking' => true,
            'origQuoteOrderQty' => '12.0',
        ];
    }
}

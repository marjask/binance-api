<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ProviderData;

use Generator;

final class CancelOrderDTOProviderData
{
    public static function data(): Generator
    {
        yield [
            'symbol' => 'ETHUSDT',
            'origClientOrderId' => '12hoh2y80dh',
            'orderId' => 1231231231,
            'orderListId' => 123123123123,
            'clientOrderId' => 'j2f09jpia',
            'price' => '123.1233',
            'origQty' => '0.1',
            'executedQty' => '0.1',
            'cummulativeQuoteQty' => '0.0',
            'status' => 'CANCELED',
            'timeInForce' => 'GTC',
            'type' => 'LIMIT',
            'side' => 'BUY',
        ];
    }
}

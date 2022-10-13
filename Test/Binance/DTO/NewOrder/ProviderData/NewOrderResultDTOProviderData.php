<?php

declare(strict_types=1);

namespace Test\Binance\DTO\NewOrder\ProviderData;

use Generator;

final class NewOrderResultDTOProviderData
{
    public static function data(): Generator
    {
        yield [
            'symbol' => 'ETHUSDT',
            'orderId' => 123123123,
            'orderListId' => 123123123,
            'clientOrderId' => '1230qud091a',
            'transactTime' => 12312312312313,
            'price' => '123.123',
            'origQty' => '12.112',
            'executedQty' => '12.123',
            'cummulativeQuoteQty' => '12.1',
            'status' => 'NEW',
            'timeInForce' => 'GTC',
            'type' => 'LIMIT',
            'side' => 'BUY',
            'strategyId' => 1,
            'strategyType' => 12,
        ];
    }
}

<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ProviderData;

use Generator;

final class AccountTradeDTOProviderData
{
    public static function data(): Generator
    {
        yield [
            'symbol' => 'ETHUSDT',
            'id' => 123123,
            'orderId' => 123123123,
            'orderListId' => 123123123123123123,
            'price' => '21.212',
            'qty' => '12.12',
            'quoteQty' => '3.1',
            'commission' => '0.01',
            'commissionAsset' => '0.01',
            'time' => 123123123123213,
            'isBuyer' => false,
            'isMaker' => false,
            'isBestMatch' => true,
        ];
    }
}

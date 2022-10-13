<?php

declare(strict_types=1);

namespace Test\Binance\DTO\NewOrder\ProviderData;

use Generator;

final class NewOrderAckDTOProviderData
{
    public static function data(): Generator
    {
        yield [
            'symbol' => 'ETHUSDT',
            'orderId' => 12312312,
            'orderListId' => 123123183123,
            'clientOrderId' => 'asfh2083ha',
            'transactTime' => 12312312312312,
        ];
    }
}

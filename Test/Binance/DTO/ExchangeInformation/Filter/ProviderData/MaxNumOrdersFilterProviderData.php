<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ExchangeInformation\Filter\ProviderData;

use Generator;

final class MaxNumOrdersFilterProviderData
{
    public static function data(): Generator
    {
        yield [
            'filterType' => 'MAX_NUM_ORDERS',
            'maxNumOrders' => 100,
        ];
    }

    public static function invalidData(): Generator
    {
        yield [
            'filterType' => 'TEST',
            'maxNumOrders' => 100,
        ];
    }
}

<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ExchangeInformation\Filter\ProviderData;

use Generator;

final class MaxNumAlgoOrdersFilterProviderData
{
    public static function data(): Generator
    {
        yield [
            'filterType' => 'MAX_NUM_ALGO_ORDERS',
            'maxNumAlgoOrders' => 100,
        ];
    }

    public static function invalidData(): Generator
    {
        yield [
            'filterType' => 'TEST',
            'maxNumAlgoOrders' => 100,
        ];
    }
}

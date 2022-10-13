<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ProviderData;

use Generator;

final class CurrentOrderCountUsageDTOProviderData
{
    public static function data(): Generator
    {
        yield [
            'rateLimitType' => 'test',
            'interval' => '1M',
            'intervalNum' => 1,
            'limit' => 10,
            'count' => 100,
        ];
    }
}

<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ExchangeInformation\Filter\ProviderData;

use Generator;

final class IcebergPartsFilterProviderData
{
    public static function data(): Generator
    {
        yield [
            'filterType' => 'ICEBERG_PARTS',
            'limit' => 12,
        ];
    }

    public static function invalidData(): Generator
    {
        yield [
            'filterType' => 'TEST',
            'limit' => 12,
        ];
    }
}

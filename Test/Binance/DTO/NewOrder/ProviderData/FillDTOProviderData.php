<?php

declare(strict_types=1);

namespace Test\Binance\DTO\NewOrder\ProviderData;

use Generator;

final class FillDTOProviderData
{
    public static function data(): Generator
    {
        yield [
            'price' => '123.123',
            'qty' => '123.1',
            'commission' => '0.001',
            'commissionAsset' => '0.0012',
            'tradeId' => 123123,
        ];
    }
}

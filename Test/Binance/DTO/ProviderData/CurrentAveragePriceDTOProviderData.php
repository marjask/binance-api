<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ProviderData;

use Generator;

final class CurrentAveragePriceDTOProviderData
{
    public static function data(): Generator
    {
        yield [
            'mins' => 1,
            'price' => '1123123.123',
        ];
    }
}

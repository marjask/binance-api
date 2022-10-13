<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ProviderData;

use Generator;

final class BalanceDTOProviderData
{
    public static function data(): Generator
    {
        yield [
            'asset' => 'USDT',
            'free' => '1123123.123',
            'locked' => '123.123',
        ];
    }
}

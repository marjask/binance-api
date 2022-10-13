<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ExchangeInformation\Filter\ProviderData;

use Generator;

final class TrailingDeltaFilterProviderData
{
    public static function data(): Generator
    {
        yield [
            'filterType' => 'TRAILING_DELTA',
            'minTrailingAboveDelta' => 1,
            'maxTrailingAboveDelta' => 2,
            'minTrailingBelowDelta' => 3,
            'maxTrailingBelowDelta' => 4,
        ];
    }

    public static function invalidData(): Generator
    {
        yield [
            'filterType' => 'TEST',
            'minTrailingAboveDelta' => 1,
            'maxTrailingAboveDelta' => 2,
            'minTrailingBelowDelta' => 3,
            'maxTrailingBelowDelta' => 4,
        ];
    }
}

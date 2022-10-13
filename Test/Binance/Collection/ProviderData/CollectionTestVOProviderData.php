<?php

declare(strict_types=1);

namespace Test\Binance\Collection\ProviderData;

use Generator;

final class CollectionTestVOProviderData
{
    public static function oneElementProviderData(): Generator
    {
        yield [
            'element' => new TestVO('str'),
            'expectedArray' => [
                'str',
            ],
        ];
    }

    public static function twoElementsProviderData(): Generator
    {
        yield [
            'element1' => new TestVO('str'),
            'element2' => new TestVO('test'),
            'expectedArray' => [
                'str',
                'test',
            ],
        ];
    }
}

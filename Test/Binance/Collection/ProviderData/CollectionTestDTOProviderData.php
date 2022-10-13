<?php

declare(strict_types=1);

namespace Test\Binance\Collection\ProviderData;

use Generator;

final class CollectionTestDTOProviderData
{
    public static function oneElementProviderData(): Generator
    {
        yield [
            'element' => new TestDTO('str'),
            'expectedArray' => [
                [
                    'test' => 'str',
                ]
            ],
        ];
    }

    public static function twoElementsProviderData(): Generator
    {
        yield [
            'element1' => new TestDTO('str'),
            'element2' => new TestDTO('test'),
            'expectedArray' =>[
                [
                    'test' => 'str',
                ],
                [
                    'test' => 'test',
                ],
            ],
        ];
    }
}

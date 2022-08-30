<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject\ProviderData;

use Binance\ValueObject\Id;
use Binance\ValueObject\Integer;
use Binance\ValueObject\Symbol;
use Binance\ValueObject\Text;
use Generator;

final class ValueObjectUtilsProviderData
{
    public static function validProviderData(): Generator
    {
        yield [
            'valueObject' => new Id(123),
            'expected' => 123,
            'default' => null,
        ];
        yield [
            'valueObject' => new Integer(1234),
            'expected' => 1234,
            'default' => null,
        ];
        yield [
            'valueObject' => new Text('phpunit'),
            'expected' => 'phpunit',
            'default' => null,
        ];
        yield [
            'valueObject' => null,
            'expected' => null,
            'default' => null,
        ];
        yield [
            'valueObject' => null,
            'expected' => 1,
            'default' => 1,
        ];
        yield [
            'valueObject' => new Symbol('BTCUSDT'),
            'expected' => 'BTCUSDT',
            'default' => null,
        ];
    }
}

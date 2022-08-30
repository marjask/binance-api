<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject\ProviderData;

use Generator;

final class TimestampProviderData
{
    public static function validProviderData(): Generator
    {
        yield [
            'value' => 1661850452
        ];
        yield [
            'value' => 1661810452
        ];
        yield [
            'value' => null
        ];
    }

    public static function invalidTypeProviderData(): Generator
    {
        yield [
            'value' => true
        ];
        yield [
            'value' => 123.12
        ];
        yield [
            'value' => 'abc'
        ];
        yield [
            'value' => 'true'
        ];
        yield [
            'value' => '9898090'
        ];
    }

    public static function invalidNegativeValuesProviderData(): Generator
    {
        yield [
            'value' => -1661850452
        ];
    }

    public static function validStringValuesProviderData(): Generator
    {
        yield [
            'value' => '-1month'
        ];
        yield [
            'value' => 'now'
        ];
        yield [
            'value' => '-1day'
        ];
        yield [
            'value' => '+1day'
        ];
        yield [
            'value' => '2022-08-30 12:00:00'
        ];
    }

    public static function invalidStringValuesProviderData(): Generator
    {
        yield [
            'value' => 'abc'
        ];
        yield [
            'value' => '123'
        ];
        yield [
            'value' => 'test'
        ];
    }
}

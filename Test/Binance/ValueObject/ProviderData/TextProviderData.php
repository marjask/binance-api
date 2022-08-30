<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject\ProviderData;

use Generator;

final class TextProviderData
{
    public static function validProviderData(): Generator
    {
        yield [
            'value' => 'Lorem ipsum 123'
        ];
        yield [
            'value' => 'PHPUNIT_24COIN'
        ];
        yield [
            'value' => 'PHPUNIT24.COIN'
        ];
        yield [
            'value' => <<<TEXT
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
            TEXT
        ];
    }

    public static function invalidTypeProviderData(): Generator
    {
        yield [
            'value' => 1000001
        ];
        yield [
            'value' => (object) ['test' => 1]
        ];
        yield [
            'value' => true
        ];
        yield [
            'value' => 123.12
        ];
        yield [
            'value' => null
        ];
    }
}

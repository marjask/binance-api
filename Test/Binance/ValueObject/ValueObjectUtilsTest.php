<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject;

use Binance\ValueObject\AbstractValueObject;
use Binance\ValueObject\ValueObjectUtils;
use PHPUnit\Framework\TestCase;

final class ValueObjectUtilsTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\ValueObjectUtilsProviderData::validProviderData
     */
    public function testGetOrDefault(?AbstractValueObject $valueObject, mixed $expected, mixed $default): void
    {
        $this->assertSame($expected, ValueObjectUtils::getOrDefault($valueObject, $default));
    }
}

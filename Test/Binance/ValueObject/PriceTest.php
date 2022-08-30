<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject;

use Binance\ValueObject\Price;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class PriceTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\PriceProviderData::validProviderData
     */
    public function testValidInput(mixed $value): void
    {
        $price = new Price($value);

        $this->assertInstanceOf(Price::class, $price);
        $this->assertTrue(is_string($price->getValue()));
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\PriceProviderData::invalidProviderData
     */
    public function testInvalidInput(mixed $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Price($value);
    }

    public function testValueToString(): void
    {
        $this->assertSame('300', (new Price(300))->getValue());
        $this->assertSame('10.55', (new Price(10.55))->getValue());
    }

    public function testReturnOtherValue(): void
    {
        $this->assertFalse((new Price(12))->getValue() === null);
    }
}

<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject;

use Binance\ValueObject\OrderSide;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use TypeError;

final class OrderSideTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\OrderSideProviderData::validProviderData
     */
    public function testValidInput(mixed $value): void
    {
        $orderSide = new OrderSide($value);

        $this->assertInstanceOf(OrderSide::class, $orderSide);
        $this->assertTrue(is_string($orderSide->getValue()));
        $this->assertSame($value, $orderSide->getValue());
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\OrderSideProviderData::invalidProviderData
     */
    public function testInvalidInput(mixed $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        new OrderSide($value);
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\OrderSideProviderData::invalidTypeProviderData
     */
    public function testInvalidTypeInput(mixed $value): void
    {
        $this->expectException(TypeError::class);
        new OrderSide($value);
    }

    public function testReturnOtherValue(): void
    {
        $this->assertFalse((new OrderSide('BUY'))->getValue() === null);
    }
}

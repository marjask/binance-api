<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject;

use Binance\ValueObject\OrderType;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use TypeError;

final class OrderTypeTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\OrderTypeProviderData::validProviderData
     */
    public function testValidInput(mixed $value): void
    {
        $orderType = new OrderType($value);

        $this->assertInstanceOf(OrderType::class, $orderType);
        $this->assertTrue(is_string($orderType->getValue()));
        $this->assertSame($value, $orderType->getValue());
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\OrderTypeProviderData::invalidProviderData
     */
    public function testInvalidInput(mixed $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        new OrderType($value);
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\OrderTypeProviderData::invalidTypeProviderData
     */
    public function testInvalidTypeInput(mixed $value): void
    {
        $this->expectException(TypeError::class);
        new OrderType($value);
    }

    public function testReturnOtherValue(): void
    {
        $this->assertFalse((new OrderType('MARKET'))->getValue() === null);
    }
}

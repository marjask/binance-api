<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject;

use Binance\ValueObject\OrderRespType;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class OrderRespTypeTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\OrderRespTypeProviderData::validProviderData
     */
    public function testValidInput(mixed $value): void
    {
        $orderRespType = new OrderRespType($value);

        $this->assertInstanceOf(OrderRespType::class, $orderRespType);
        $this->assertTrue(is_string($orderRespType->getValue()));
        $this->assertSame($value, $orderRespType->getValue());
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\OrderRespTypeProviderData::invalidProviderData
     */
    public function testInvalidInput(mixed $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        new OrderRespType($value);
    }

    public function testReturnOtherValue(): void
    {
        $this->assertFalse((new OrderRespType('ACK'))->getValue() === null);
    }
}

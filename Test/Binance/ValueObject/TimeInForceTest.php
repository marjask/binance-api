<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject;

use Binance\ValueObject\TimeInForce;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use TypeError;

final class TimeInForceTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\TimeInForceProviderData::validProviderData
     */
    public function testValidInput(mixed $value): void
    {
        $timeInForce = new TimeInForce($value);

        $this->assertInstanceOf(TimeInForce::class, $timeInForce);
        $this->assertTrue(is_string($timeInForce->getValue()));
        $this->assertSame($value, $timeInForce->getValue());
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\TimeInForceProviderData::invalidProviderData
     */
    public function testInvalidInput(mixed $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        new TimeInForce($value);
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\TimeInForceProviderData::invalidTypeProviderData
     */
    public function testInvalidTypeInput(mixed $value): void
    {
        $this->expectException(TypeError::class);
        new TimeInForce($value);
    }

    public function testReturnOtherValue(): void
    {
        $this->assertFalse((new TimeInForce('GTC'))->getValue() === null);
    }
}

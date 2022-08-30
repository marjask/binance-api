<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject;

use Binance\ValueObject\Real;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class RealTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\RealProviderData::validProviderData
     */
    public function testValidInput(mixed $value): void
    {
        $real = new Real($value);

        $this->assertInstanceOf(Real::class, $real);
        $this->assertTrue(is_float($real->getValue()));
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\RealProviderData::invalidProviderData
     */
    public function testInvalidInput(mixed $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Real($value);
    }

    public function testValueToString(): void
    {
        $this->assertSame('300.77', (new Real(300.77))->toString());
    }

    public function testReturnOtherValue(): void
    {
        $this->assertFalse((new Real(12.50))->getValue() === null);
    }
}

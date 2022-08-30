<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject;

use Binance\ValueObject\Integer;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class IntegerTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\IntegerProviderData::validProviderData
     */
    public function testValidInput(mixed $value): void
    {
        $integer = new Integer($value);

        $this->assertInstanceOf(Integer::class, $integer);
        $this->assertTrue(is_int($integer->getValue()));
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\IntegerProviderData::invalidProviderData
     */
    public function testInvalidInput(mixed $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Integer($value);
    }

    public function testValueToString(): void
    {
        $this->assertSame('300', (new Integer(300))->toString());
    }

    public function testReturnOtherValue(): void
    {
        $this->assertFalse((new Integer(12))->getValue() === null);
    }
}

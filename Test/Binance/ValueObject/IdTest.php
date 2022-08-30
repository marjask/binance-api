<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject;

use Binance\ValueObject\Id;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use TypeError;

final class IdTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\IdProviderData::validProviderData
     */
    public function testValidInput(mixed $value): void
    {
        $id = new Id($value);

        $this->assertInstanceOf(Id::class, $id);
        $this->assertTrue(is_int($id->getValue()));
        $this->assertSame($value, $id->getValue());
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\IdProviderData::invalidProviderData
     */
    public function testInvalidInput(mixed $value): void
    {
        $this->expectException(TypeError::class);
        new Id($value);
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\IdProviderData::invalidNegativeDataProviderData
     */
    public function testInvalidNegativeInput(mixed $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Id($value);
    }

    public function testValueToString(): void
    {
        $this->assertSame('300', (new Id(300))->toString());
    }

    public function testReturnOtherValue(): void
    {
        $this->assertFalse((new Id(12))->getValue() === null);
    }
}

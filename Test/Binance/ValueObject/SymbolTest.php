<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject;

use Binance\ValueObject\Symbol;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use TypeError;

final class SymbolTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\SymbolProviderData::validProviderData
     */
    public function testValidInput(string $value): void
    {
        $symbol = new Symbol($value);

        $this->assertInstanceOf(Symbol::class, $symbol);
        $this->assertTrue(is_string($symbol->getValue()));
        $this->assertSame($value, $symbol->getValue());
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\SymbolProviderData::validProviderData
     */
    public function testValidInputStaticMethod(string $value): void
    {
        $symbol = Symbol::fromString($value);

        $this->assertInstanceOf(Symbol::class, $symbol);
        $this->assertTrue(is_string($symbol->getValue()));
        $this->assertSame($value, $symbol->getValue());
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\SymbolProviderData::invalidProviderData
     */
    public function testInvalidInput(mixed $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Symbol($value);
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\SymbolProviderData::invalidProviderData
     */
    public function testInvalidInputStaticMethod(mixed $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        Symbol::fromString($value);
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\SymbolProviderData::invalidTypeProviderData
     */
    public function testInvalidTypeInput(mixed $value): void
    {
        $this->expectException(TypeError::class);
        new Symbol($value);
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\SymbolProviderData::invalidTypeProviderData
     */
    public function testInvalidTypeInputStaticMethod(mixed $value): void
    {
        $this->expectException(TypeError::class);
        Symbol::fromString($value);
    }

    public function testReturnOtherValue(): void
    {
        $this->assertFalse((new Symbol('ABC'))->getValue() === null);
    }
}

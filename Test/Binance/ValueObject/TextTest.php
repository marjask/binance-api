<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject;

use Binance\ValueObject\Text;
use PHPUnit\Framework\TestCase;
use TypeError;

final class TextTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\TextProviderData::validProviderData
     */
    public function testValidInput(string $value): void
    {
        $text = new Text($value);

        $this->assertInstanceOf(Text::class, $text);
        $this->assertTrue(is_string($text->getValue()));
        $this->assertSame($value, $text->getValue());
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\TextProviderData::invalidTypeProviderData
     */
    public function testInvalidTypeInput(mixed $value): void
    {
        $this->expectException(TypeError::class);
        new Text($value);
    }

    public function testReturnOtherValue(): void
    {
        $this->assertFalse((new Text('ABC'))->getValue() === null);
    }
}

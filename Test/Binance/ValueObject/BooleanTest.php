<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject;

use Binance\ValueObject\Boolean;
use PHPUnit\Framework\TestCase;
use TypeError;

final class BooleanTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\BooleanProviderData::validProviderData
     */
    public function testValidInput(bool $value): void
    {
        $boolean = new Boolean($value);

        $this->assertInstanceOf(Boolean::class, $boolean);
        $this->assertTrue(is_bool($boolean->getValue()));
        $this->assertTrue(is_bool($boolean->toBoolean()));
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\BooleanProviderData::invalidProviderData
     */
    public function testInvalidInput(mixed $value): void
    {
        $this->expectException(TypeError::class);
        new Boolean($value);
    }

    public function testValueToString(): void
    {
        $this->assertSame('true', (new Boolean(true))->toString());
        $this->assertSame('false', (new Boolean(false))->toString());
    }

    public function testReturnOtherValue(): void
    {
        $this->assertFalse((new Boolean(true))->getValue() === null);
    }
}

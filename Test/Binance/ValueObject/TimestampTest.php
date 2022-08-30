<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject;

use Binance\ValueObject\Timestamp;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use TypeError;

final class TimestampTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\TimestampProviderData::validProviderData
     */
    public function testValidInput(?int $value): void
    {
        $timestamp = new Timestamp($value);

        $this->assertInstanceOf(Timestamp::class, $timestamp);
        $this->assertTrue(is_int($timestamp->getValue()));
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\TimestampProviderData::validStringValuesProviderData
     */
    public function testStringValueValidInput(string $value): void
    {
        $timestamp = Timestamp::fromString($value);

        $this->assertInstanceOf(Timestamp::class, $timestamp);
        $this->assertTrue(is_int($timestamp->getValue()));
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\TimestampProviderData::invalidTypeProviderData
     */
    public function testInvalidInput(mixed $value): void
    {
        $this->expectException(TypeError::class);
        new Timestamp($value);
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\TimestampProviderData::invalidNegativeValuesProviderData
     */
    public function testInvalidNegativeInput(mixed $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Timestamp($value);
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\TimestampProviderData::invalidStringValuesProviderData
     */
    public function testInvalidStringValueInput(string $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        Timestamp::fromString($value);
    }

    public function testValueToString(): void
    {
        $this->assertSame('1661850452000', (new Timestamp(1661850452))->toString());
    }

    public function testReturnOtherValue(): void
    {
        $this->assertFalse((new Timestamp(1661850452))->getValue() === null);
    }
}

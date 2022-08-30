<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject;

use Binance\ValueObject\StrategyType;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use TypeError;

final class StrategyTypeTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\StrategyTypeProviderData::validProviderData
     */
    public function testValidInput(int $value): void
    {
        $strategyType = new StrategyType($value);

        $this->assertInstanceOf(StrategyType::class, $strategyType);
        $this->assertTrue(is_int($strategyType->getValue()));
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\StrategyTypeProviderData::invalidProviderData
     */
    public function testInvalidInput(mixed $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        new StrategyType($value);
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\StrategyTypeProviderData::invalidTypeProviderData
     */
    public function testInvalidTypeInput(mixed $value): void
    {
        $this->expectException(TypeError::class);
        new StrategyType($value);
    }

    public function testValueToString(): void
    {
        $this->assertSame('300', (new StrategyType(300))->toString());
    }

    public function testReturnOtherValue(): void
    {
        $this->assertFalse((new StrategyType(12))->getValue() === null);
    }
}

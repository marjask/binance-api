<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject;

use Binance\ValueObject\RecvWindow;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use TypeError;

final class RecvWindowTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\RecvWindowProviderData::validProviderData
     */
    public function testValidInput(int $value): void
    {
        $recvWindow = new RecvWindow($value);

        $this->assertInstanceOf(RecvWindow::class, $recvWindow);
        $this->assertTrue(is_int($recvWindow->getValue()));
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\RecvWindowProviderData::invalidProviderData
     */
    public function testInvalidInput(mixed $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        new RecvWindow($value);
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\RecvWindowProviderData::invalidTypeProviderData
     */
    public function testInvalidTypeInput(mixed $value): void
    {
        $this->expectException(TypeError::class);
        new RecvWindow($value);
    }

    public function testValueToString(): void
    {
        $this->assertSame('300', (new RecvWindow(300))->toString());
    }

    public function testReturnOtherValue(): void
    {
        $this->assertFalse((new RecvWindow(12))->getValue() === null);
    }
}

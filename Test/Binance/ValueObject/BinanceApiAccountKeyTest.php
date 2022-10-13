<?php

declare(strict_types=1);

namespace Test\Binance\ValueObject;

use Binance\ValueObject\BinanceApiAccountKey;
use PHPUnit\Framework\TestCase;
use TypeError;

final class BinanceApiAccountKeyTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\BinanceApiAccountKeyProviderData::validProviderData
     */
    public function testValidInput(string $apiKey, string $secretKey): void
    {
        $binanceApiAccountKey = new BinanceApiAccountKey($apiKey, $secretKey);

        $this->assertInstanceOf(BinanceApiAccountKey::class, $binanceApiAccountKey);
        $this->assertSame($apiKey, $binanceApiAccountKey->getApiKey());
        $this->assertSame($secretKey, $binanceApiAccountKey->getSecretKey());
    }

    /**
     * @dataProvider \Test\Binance\ValueObject\ProviderData\BinanceApiAccountKeyProviderData::invalidProviderData
     */
    public function testInvalidInput(mixed $apiKey, mixed $secretKey): void
    {
        $this->expectException(TypeError::class);
        new BinanceApiAccountKey($apiKey, $secretKey);
    }
}

<?php

declare(strict_types=1);

namespace Test\Binance\DTO;

use Binance\DTO\SymbolPriceDTO;
use PHPUnit\Framework\TestCase;

final class SymbolPriceDTOTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\ProviderData\SymbolPriceDTOProviderData::data()
     */
    public function testDTO(
        string $symbol,
        string $price,
    ): void {
        $dto = new SymbolPriceDTO($symbol, $price);

        $this->assertInstanceOf(SymbolPriceDTO::class, $dto);
        $this->assertSame($symbol, $dto->getSymbol());
        $this->assertSame($price, $dto->getPrice());
        $this->assertSame([
            'symbol' => $symbol,
            'price' => $price,
        ], $dto->toArray());
    }
}

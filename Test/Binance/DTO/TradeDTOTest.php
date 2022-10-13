<?php

declare(strict_types=1);

namespace Test\Binance\DTO;

use Binance\DTO\TradeDTO;
use PHPUnit\Framework\TestCase;

final class TradeDTOTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\ProviderData\TradeDTOProviderData::data
     */
    public function testDTO(
        int $id,
        string $price,
        string $qty,
        string $quoteQty,
        int $time,
        bool $isBuyerMaker,
        bool $isBestMatch,
    ): void {
        $dto = new TradeDTO($id, $price, $qty, $quoteQty, $time, $isBuyerMaker, $isBestMatch);

        $this->assertInstanceOf(TradeDTO::class, $dto);
        $this->assertSame($id, $dto->getId());
        $this->assertSame($price, $dto->getPrice());
        $this->assertSame($qty, $dto->getQty());
        $this->assertSame($quoteQty, $dto->getQuoteQty());
        $this->assertSame($time, $dto->getTime());
        $this->assertSame($isBuyerMaker, $dto->isBuyerMaker());
        $this->assertSame($isBestMatch, $dto->isBestMatch());
        $this->assertSame([
            'id' => $id,
            'price' => $price,
            'qty' => $qty,
            'quoteQty' => $quoteQty,
            'time' => $time,
            'isBuyerMaker' => $isBuyerMaker,
            'isBestMatch' => $isBestMatch,
        ], $dto->toArray());
    }
}

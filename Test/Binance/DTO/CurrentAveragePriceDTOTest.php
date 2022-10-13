<?php

declare(strict_types=1);

namespace Test\Binance\DTO;

use Binance\DTO\CurrentAveragePriceDTO;
use PHPUnit\Framework\TestCase;

final class CurrentAveragePriceDTOTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\ProviderData\CurrentAveragePriceDTOProviderData::data()
     */
    public function testDTO(
        int $mins,
        string $price,
    ): void {
        $dto = new CurrentAveragePriceDTO($mins, $price);

        $this->assertInstanceOf(CurrentAveragePriceDTO::class, $dto);
        $this->assertSame($mins, $dto->getMins());
        $this->assertSame($price, $dto->getPrice());
        $this->assertSame([
            'mins' => $mins,
            'price' => $price,
        ], $dto->toArray());
    }
}

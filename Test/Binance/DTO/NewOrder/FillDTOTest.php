<?php

declare(strict_types=1);

namespace Test\Binance\DTO\NewOrder;

use Binance\DTO\NewOrder\FillDTO;
use PHPUnit\Framework\TestCase;

final class FillDTOTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\NewOrder\ProviderData\FillDTOProviderData::data()
     */
    public function testDTO(
        string $price,
        string $qty,
        string $commission,
        string $commissionAsset,
        int $tradeId,
    ): void {
        $dto = new FillDTO(
            $price,
            $qty,
            $commission,
            $commissionAsset,
            $tradeId
        );

        $this->assertInstanceOf(FillDTO::class, $dto);
        $this->assertSame($price, $dto->getPrice());
        $this->assertSame($qty, $dto->getQty());
        $this->assertSame($commission, $dto->getCommission());
        $this->assertSame($commissionAsset, $dto->getCommissionAsset());
        $this->assertSame($tradeId, $dto->getTradeId());
        $this->assertSame([
            'price' => $price,
            'qty' => $qty,
            'commission' => $commission,
            'commissionAsset' => $commissionAsset,
            'tradeId' => $tradeId,
        ], $dto->toArray());
    }
}

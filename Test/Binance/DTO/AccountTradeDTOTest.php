<?php

declare(strict_types=1);

namespace Test\Binance\DTO;

use Binance\DTO\AccountTradeDTO;
use PHPUnit\Framework\TestCase;

final class AccountTradeDTOTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\ProviderData\AccountTradeDTOProviderData::data()
     */
    public function testDTO(
        string $symbol,
        int $id,
        int $orderId,
        int $orderListId,
        string $price,
        string $qty,
        string $quoteQty,
        string $commission,
        string $commissionAsset,
        int $time,
        bool $isBuyer,
        bool $isMaker,
        bool $isBestMatch,
    ): void {
        $dto = new AccountTradeDTO(
            $symbol,
            $id,
            $orderId,
            $orderListId,
            $price,
            $qty,
            $quoteQty,
            $commission,
            $commissionAsset,
            $time,
            $isBuyer,
            $isMaker,
            $isBestMatch
        );

        $this->assertInstanceOf(AccountTradeDTO::class, $dto);
        $this->assertSame($symbol, $dto->getSymbol());
        $this->assertSame($id, $dto->getId());
        $this->assertSame($orderId, $dto->getOrderId());
        $this->assertSame($orderListId, $dto->getOrderListId());
        $this->assertSame($price, $dto->getPrice());
        $this->assertSame($qty, $dto->getQty());
        $this->assertSame($quoteQty, $dto->getQuoteQty());
        $this->assertSame($commission, $dto->getCommission());
        $this->assertSame($commissionAsset, $dto->getCommissionAsset());
        $this->assertSame($time, $dto->getTime());
        $this->assertSame($isBuyer, $dto->isBuyer());
        $this->assertSame($isMaker, $dto->isMaker());
        $this->assertSame($isBestMatch, $dto->isBestMatch());
        $this->assertSame([
            'symbol' => $symbol,
            'id' => $id,
            'orderId' => $orderId,
            'orderListId' => $orderListId,
            'price' => $price,
            'qty' => $qty,
            'quoteQty' => $quoteQty,
            'commission' => $commission,
            'commissionAsset' => $commissionAsset,
            'time' => $time,
            'isBuyer' => $isBuyer,
            'isMaker' => $isMaker,
            'isBestMatch' => $isBestMatch
        ], $dto->toArray());
    }
}

<?php

declare(strict_types=1);

namespace Test\Binance\DTO\NewOrder;

use Binance\DTO\Collection\FillDTOCollection;
use Binance\DTO\NewOrder\NewOrderFullDTO;
use PHPUnit\Framework\TestCase;

final class NewOrderFullDTOTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\NewOrder\ProviderData\NewOrderFullDTOProviderData::data()
     */
    public function testDTO(
        string $symbol,
        int $orderId,
        int $orderListId,
        string $clientOrderId,
        int $transactTime,
        string $price,
        string $origQty,
        string $executedQty,
        string $cummulativeQuoteQty,
        string $status,
        string $timeInForce,
        string $type,
        string $side,
        FillDTOCollection $fills,
        array $expectedFills,
    ): void {
        $dto = new NewOrderFullDTO(
            $symbol,
            $orderId,
            $orderListId,
            $clientOrderId,
            $transactTime,
            $price,
            $origQty,
            $executedQty,
            $cummulativeQuoteQty,
            $status,
            $timeInForce,
            $type,
            $side,
            $fills,
        );

        $this->assertInstanceOf(NewOrderFullDTO::class, $dto);
        $this->assertSame($symbol, $dto->getSymbol());
        $this->assertSame($orderId, $dto->getOrderId());
        $this->assertSame($orderListId, $dto->getOrderListId());
        $this->assertSame($clientOrderId, $dto->getClientOrderId());
        $this->assertSame($transactTime, $dto->getTransactTime());
        $this->assertSame($price, $dto->getPrice());
        $this->assertSame($origQty, $dto->getOrigQty());
        $this->assertSame($executedQty, $dto->getExecutedQty());
        $this->assertSame($cummulativeQuoteQty, $dto->getCummulativeQuoteQty());
        $this->assertSame($status, $dto->getStatus());
        $this->assertSame($timeInForce, $dto->getTimeInForce());
        $this->assertSame($type, $dto->getType());
        $this->assertSame($side, $dto->getSide());
        $this->assertInstanceOf(FillDTOCollection::class, $dto->getFills());
        $this->assertSame($fills, $dto->getFills());
        $this->assertSame([
            'symbol' => $symbol,
            'orderId' => $orderId,
            'orderListId' => $orderListId,
            'clientOrderId' => $clientOrderId,
            'transactTime' => $transactTime,
            'price' => $price,
            'origQty' => $origQty,
            'executedQty' => $executedQty,
            'cummulativeQuoteQty' => $cummulativeQuoteQty,
            'status' => $status,
            'timeInForce' => $timeInForce,
            'type' => $type,
            'side' => $side,
            'fills' => $expectedFills,
        ], $dto->toArray());
    }
}

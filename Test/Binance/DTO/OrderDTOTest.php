<?php

declare(strict_types=1);

namespace Test\Binance\DTO;

use Binance\DTO\OrderDTO;
use PHPUnit\Framework\TestCase;

final class OrderDTOTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\ProviderData\OrderDTOProviderData::data()
     */
    public function testDTO(
        string $symbol,
        int $orderId,
        int $orderListId,
        string $clientOrderId,
        string $price,
        string $origQty,
        string $executedQty,
        string $cummulativeQuoteQty,
        string $status,
        string $timeInForce,
        string $type,
        string $side,
        string $stopPrice,
        string $icebergQty,
        int $time,
        int $updateTime,
        bool $isWorking,
        string $origQuoteOrderQty
    ): void {
        $dto = new OrderDTO(
            $symbol,
            $orderId,
            $orderListId,
            $clientOrderId,
            $price,
            $origQty,
            $executedQty,
            $cummulativeQuoteQty,
            $status,
            $timeInForce,
            $type,
            $side,
            $stopPrice,
            $icebergQty,
            $time,
            $updateTime,
            $isWorking,
            $origQuoteOrderQty
        );

        $this->assertInstanceOf(OrderDTO::class, $dto);
        $this->assertSame($symbol, $dto->getSymbol());
        $this->assertSame($orderId, $dto->getOrderId());
        $this->assertSame($orderListId, $dto->getOrderListId());
        $this->assertSame($clientOrderId, $dto->getClientOrderId());
        $this->assertSame($price, $dto->getPrice());
        $this->assertSame($origQty, $dto->getOrigQty());
        $this->assertSame($executedQty, $dto->getExecutedQty());
        $this->assertSame($cummulativeQuoteQty, $dto->getCummulativeQuoteQty());
        $this->assertSame($status, $dto->getStatus());
        $this->assertSame($timeInForce, $dto->getTimeInForce());
        $this->assertSame($type, $dto->getType());
        $this->assertSame($side, $dto->getSide());
        $this->assertSame($stopPrice, $dto->getStopPrice());
        $this->assertSame($icebergQty, $dto->getIcebergQty());
        $this->assertSame($time, $dto->getTime());
        $this->assertSame($updateTime, $dto->getUpdateTime());
        $this->assertSame($isWorking, $dto->isWorking());
        $this->assertSame($origQuoteOrderQty, $dto->getOrigQuoteOrderQty());

        $this->assertSame([
            'symbol' => $symbol,
            'orderId' => $orderId,
            'orderListId' => $orderListId,
            'clientOrderId' => $clientOrderId,
            'price' => $price,
            'origQty' => $origQty,
            'executedQty' => $executedQty,
            'cummulativeQuoteQty' => $cummulativeQuoteQty,
            'status' => $status,
            'timeInForce' => $timeInForce,
            'type' => $type,
            'side' => $side,
            'stopPrice' => $stopPrice,
            'icebergQty' => $icebergQty,
            'time' => $time,
            'updateTime' => $updateTime,
            'isWorking' => $isWorking,
            'origQuoteOrderQty' => $origQuoteOrderQty,
        ], $dto->toArray());
    }
}

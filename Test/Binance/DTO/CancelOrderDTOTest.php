<?php

declare(strict_types=1);

namespace Test\Binance\DTO;

use Binance\DTO\CancelOrderDTO;
use PHPUnit\Framework\TestCase;

final class CancelOrderDTOTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\ProviderData\CancelOrderDTOProviderData::data()
     */
    public function testDTO(
        string $symbol,
        string $origClientOrderId,
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
    ): void {
        $dto = new CancelOrderDTO(
            $symbol,
            $origClientOrderId,
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
        );

        $this->assertInstanceOf(CancelOrderDTO::class, $dto);
        $this->assertSame($symbol, $dto->getSymbol());
        $this->assertSame($origClientOrderId, $dto->getOrigClientOrderId());
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
        $this->assertSame([
            'symbol' => $symbol,
            'origClientOrderId' => $origClientOrderId,
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
        ], $dto->toArray());
    }
}

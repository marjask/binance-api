<?php

declare(strict_types=1);

namespace Test\Binance\DTO\NewOrder;

use Binance\DTO\NewOrder\NewOrderResultDTO;
use PHPUnit\Framework\TestCase;

final class NewOrderResultDTOTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\NewOrder\ProviderData\NewOrderResultDTOProviderData::data()
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
        ?int $strategyId,
        ?int $strategyType
    ): void {
        $dto = new NewOrderResultDTO(
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
            $strategyId,
            $strategyType
        );

        $this->assertInstanceOf(NewOrderResultDTO::class, $dto);
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
        $this->assertSame($strategyId, $dto->getStrategyId());
        $this->assertSame($strategyType, $dto->getStrategyType());
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
            'strategyId' => $strategyId,
            'strategyType' => $strategyType,
        ], $dto->toArray());
    }
}

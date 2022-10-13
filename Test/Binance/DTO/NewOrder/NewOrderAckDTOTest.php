<?php

declare(strict_types=1);

namespace Test\Binance\DTO\NewOrder;

use Binance\DTO\NewOrder\NewOrderAckDTO;
use PHPUnit\Framework\TestCase;

final class NewOrderAckDTOTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\NewOrder\ProviderData\NewOrderAckDTOProviderData::data()
     */
    public function testDTO(
        string $symbol,
        int $orderId,
        int $orderListId,
        string $clientOrderId,
        int $transactTime,
    ): void {
        $dto = new NewOrderAckDTO(
            $symbol,
            $orderId,
            $orderListId,
            $clientOrderId,
            $transactTime,
        );

        $this->assertInstanceOf(NewOrderAckDTO::class, $dto);
        $this->assertSame($symbol, $dto->getSymbol());
        $this->assertSame($orderId, $dto->getOrderId());
        $this->assertSame($orderListId, $dto->getOrderListId());
        $this->assertSame($clientOrderId, $dto->getClientOrderId());
        $this->assertSame($transactTime, $dto->getTransactTime());
        $this->assertSame([
            'symbol' => $symbol,
            'orderId' => $orderId,
            'orderListId' => $orderListId,
            'clientOrderId' => $clientOrderId,
            'transactTime' => $transactTime,
        ], $dto->toArray());
    }
}

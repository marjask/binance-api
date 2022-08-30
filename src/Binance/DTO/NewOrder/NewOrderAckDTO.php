<?php

declare(strict_types=1);

namespace Binance\DTO\NewOrder;

final class NewOrderAckDTO extends AbstractNewOrder
{
    public function __construct(
        private readonly string $symbol,
        private readonly int $orderId,
        private readonly int $orderListId,
        private readonly string $clientOrderId,
        private readonly int $transactTime
    ) {
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function getOrderListId(): int
    {
        return $this->orderListId;
    }

    public function getClientOrderId(): string
    {
        return $this->clientOrderId;
    }

    public function getTransactTime(): int
    {
        return $this->transactTime;
    }
}

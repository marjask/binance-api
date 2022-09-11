<?php

declare(strict_types=1);

namespace Binance\DTO;

use Trait\ToArray\ToArrayTrait;

final class OrderDTO
{
    use ToArrayTrait;

    public function __construct(
        private readonly string $symbol,
        private readonly int $orderId,
        private readonly int $orderListId,
        private readonly string $clientOrderId,
        private readonly string $price,
        private readonly string $origQty,
        private readonly string $executedQty,
        private readonly string $cummulativeQuoteQty,
        private readonly string $status,
        private readonly string $timeInForce,
        private readonly string $type,
        private readonly string $side,
        private readonly string $stopPrice,
        private readonly string $icebergQty,
        private readonly int $time,
        private readonly int $updateTime,
        private readonly bool $isWorking,
        private readonly string $origQuoteOrderQty
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

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getOrigQty(): string
    {
        return $this->origQty;
    }

    public function getExecutedQty(): string
    {
        return $this->executedQty;
    }

    public function getCummulativeQuoteQty(): string
    {
        return $this->cummulativeQuoteQty;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getTimeInForce(): string
    {
        return $this->timeInForce;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getSide(): string
    {
        return $this->side;
    }

    public function getStopPrice(): string
    {
        return $this->stopPrice;
    }

    public function getIcebergQty(): string
    {
        return $this->icebergQty;
    }

    public function getTime(): int
    {
        return $this->time;
    }

    public function getUpdateTime(): int
    {
        return $this->updateTime;
    }

    public function isWorking(): bool
    {
        return $this->isWorking;
    }

    public function getOrigQuoteOrderQty(): string
    {
        return $this->origQuoteOrderQty;
    }
}

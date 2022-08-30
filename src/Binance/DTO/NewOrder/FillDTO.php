<?php

declare(strict_types=1);

namespace Binance\DTO\NewOrder;

final class FillDTO
{
    public function __construct(
        private readonly string $price,
        private readonly string $qty,
        private readonly string $commission,
        private readonly string $commissionAsset,
        private readonly int $tradeId,
    ) {
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getQty(): string
    {
        return $this->qty;
    }

    public function getCommission(): string
    {
        return $this->commission;
    }

    public function getCommissionAsset(): string
    {
        return $this->commissionAsset;
    }

    public function getTradeId(): int
    {
        return $this->tradeId;
    }
}

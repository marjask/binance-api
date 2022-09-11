<?php

declare(strict_types=1);

namespace Binance\DTO;

use Trait\ToArray\ToArrayTrait;

class AccountTradeDTO
{
    use ToArrayTrait;

    public function __construct(
        private readonly string $symbol,
        private readonly int $id,
        private readonly int $orderId,
        private readonly int $orderListId,
        private readonly string $price,
        private readonly string $qty,
        private readonly string $quoteQty,
        private readonly string $commission,
        private readonly string $commissionAsset,
        private readonly int $time,
        private readonly bool $isBuyer,
        private readonly bool $isMaker,
        private readonly bool $isBestMatch
    ) {
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function getOrderListId(): int
    {
        return $this->orderListId;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getQty(): string
    {
        return $this->qty;
    }

    public function getQuoteQty(): string
    {
        return $this->quoteQty;
    }

    public function getCommission(): string
    {
        return $this->commission;
    }

    public function getCommissionAsset(): string
    {
        return $this->commissionAsset;
    }

    public function getTime(): int
    {
        return $this->time;
    }

    public function isBuyer(): bool
    {
        return $this->isBuyer;
    }

    public function isMaker(): bool
    {
        return $this->isMaker;
    }

    public function isBestMatch(): bool
    {
        return $this->isBestMatch;
    }
}

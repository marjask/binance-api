<?php

declare(strict_types=1);

namespace Binance\DTO;

use Trait\ToArray\ToArrayTrait;

class TradeDTO
{
    use ToArrayTrait;

    public function __construct(
        private readonly int $id,
        private readonly string $price,
        private readonly string $qty,
        private readonly string $quoteQty,
        private readonly int $time,
        private readonly bool $isBuyerMaker,
        private readonly bool $isBestMatch
    ) {
    }

    public function getId(): int
    {
        return $this->id;
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

    public function getTime(): int
    {
        return $this->time;
    }

    public function isBuyerMaker(): bool
    {
        return $this->isBuyerMaker;
    }

    public function isBestMatch(): bool
    {
        return $this->isBestMatch;
    }
}

<?php

declare(strict_types=1);

namespace Binance\DTO;

class SymbolPriceDTO
{
    public function __construct(
        private readonly string $symbol,
        private readonly string $price,
    ) {
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getPrice(): string
    {
        return $this->price;
    }
}

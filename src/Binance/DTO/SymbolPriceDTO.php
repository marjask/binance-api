<?php

declare(strict_types=1);

namespace Binance\DTO;

use Trait\ToArray\ToArrayTrait;

class SymbolPriceDTO
{
    use ToArrayTrait;

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

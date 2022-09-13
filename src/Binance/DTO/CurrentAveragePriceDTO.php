<?php

namespace Binance\DTO;

use Trait\ToArray\ToArrayTrait;

final class CurrentAveragePriceDTO
{
    use ToArrayTrait;

    public function __construct(
        private readonly int $mins,
        private readonly string $price,
    ) {
    }

    public function getMins(): int
    {
        return $this->mins;
    }

    public function getPrice(): string
    {
        return $this->price;
    }
}

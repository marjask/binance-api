<?php

declare(strict_types=1);

namespace Binance\DTO;

final class BalancesDTO
{
    public function __construct(
        private readonly string $asset,
        private readonly string $free,
        private readonly string $locked,
    ) {
    }

    public function getAsset(): string
    {
        return $this->asset;
    }

    public function getFree(): string
    {
        return $this->free;
    }

    public function getLocked(): string
    {
        return $this->locked;
    }
}

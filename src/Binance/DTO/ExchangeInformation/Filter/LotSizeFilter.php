<?php

declare(strict_types=1);

namespace Binance\DTO\ExchangeInformation\Filter;

class LotSizeFilter extends AbstractFilter
{
    public function __construct(
        string $filterType,
        private readonly string $minQty,
        private readonly string $maxQty,
        private readonly string $stepSize
    ) {
        parent::__construct($filterType);
    }

    public function getMinQty(): string
    {
        return $this->minQty;
    }

    public function getMaxQty(): string
    {
        return $this->maxQty;
    }

    public function getStepSize(): string
    {
        return $this->stepSize;
    }
}

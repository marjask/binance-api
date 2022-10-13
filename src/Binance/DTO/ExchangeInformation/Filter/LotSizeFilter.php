<?php

declare(strict_types=1);

namespace Binance\DTO\ExchangeInformation\Filter;

class LotSizeFilter extends AbstractFilter
{
    public function __construct(
        string $filterType,
        protected readonly string $minQty,
        protected readonly string $maxQty,
        protected readonly string $stepSize
    ) {
        parent::__construct($filterType);
    }

    protected function getClassFilterType(): string
    {
        return FilterConst::LOT_SIZE;
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

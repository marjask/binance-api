<?php

declare(strict_types=1);

namespace Binance\DTO\ExchangeInformation\Filter;

final class PriceFilter extends AbstractFilter
{
    public function __construct(
        string $filterType,
        private readonly string $minPrice,
        private readonly string $maxPrice,
        private readonly string $tickSize
    ) {
        parent::__construct($filterType);
    }

    protected function getClassFilterType(): string
    {
        return FilterConst::PRICE_FILTER;
    }

    public function getMinPrice(): string
    {
        return $this->minPrice;
    }

    public function getMaxPrice(): string
    {
        return $this->maxPrice;
    }

    public function getTickSize(): string
    {
        return $this->tickSize;
    }
}

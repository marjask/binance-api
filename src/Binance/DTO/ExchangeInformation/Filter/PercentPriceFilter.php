<?php

declare(strict_types=1);

namespace Binance\DTO\ExchangeInformation\Filter;

final class PercentPriceFilter extends AbstractFilter
{
    public function __construct(
        string $filterType,
        private readonly string $multiplierUp,
        private readonly string $multiplierDown,
        private readonly int $avgPriceMins
    ) {
        parent::__construct($filterType);
    }

    protected function getClassFilterType(): string
    {
        return FilterConst::PERCENT_PRICE;
    }

    public function getMultiplierUp(): string
    {
        return $this->multiplierUp;
    }

    public function getMultiplierDown(): string
    {
        return $this->multiplierDown;
    }

    public function getAvgPriceMins(): int
    {
        return $this->avgPriceMins;
    }
}

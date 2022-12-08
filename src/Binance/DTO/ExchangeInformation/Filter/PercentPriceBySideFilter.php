<?php

declare(strict_types=1);

namespace Binance\DTO\ExchangeInformation\Filter;

final class PercentPriceBySideFilter extends AbstractFilter
{
    public function __construct(
        string $filterType,
        private readonly string $bidMultiplierUp,
        private readonly string $bidMultiplierDown,
        private readonly string $askMultiplierUp,
        private readonly string $askMultiplierDown,
        private readonly int $avgPriceMins
    ) {
        parent::__construct($filterType);
    }

    protected function getClassFilterType(): string
    {
        return FilterConst::PERCENT_PRICE_BY_SIDE;
    }

    public function getBidMultiplierUp(): string
    {
        return $this->bidMultiplierUp;
    }

    public function getBidMultiplierDown(): string
    {
        return $this->bidMultiplierDown;
    }

    public function getAskMultiplierUp(): string
    {
        return $this->askMultiplierUp;
    }

    public function getAskMultiplierDown(): string
    {
        return $this->askMultiplierDown;
    }

    public function getAvgPriceMins(): int
    {
        return $this->avgPriceMins;
    }
}

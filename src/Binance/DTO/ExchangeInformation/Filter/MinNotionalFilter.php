<?php

declare(strict_types=1);

namespace Binance\DTO\ExchangeInformation\Filter;

final class MinNotionalFilter extends AbstractFilter
{
    public function __construct(
        string $filterType,
        private readonly string $minNotional,
        private readonly bool $applyToMarket,
        private readonly int $avgPriceMins
    ) {
        parent::__construct($filterType);
    }

    protected function getClassFilterType(): string
    {
        return FilterConst::MIN_NOTIONAL;
    }

    public function getMinNotional(): string
    {
        return $this->minNotional;
    }

    public function isApplyToMarket(): bool
    {
        return $this->applyToMarket;
    }

    public function getAvgPriceMins(): int
    {
        return $this->avgPriceMins;
    }
}

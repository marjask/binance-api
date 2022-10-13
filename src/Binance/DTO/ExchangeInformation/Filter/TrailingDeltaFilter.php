<?php

declare(strict_types=1);

namespace Binance\DTO\ExchangeInformation\Filter;

final class TrailingDeltaFilter extends AbstractFilter
{
    public function __construct(
        string $filterType,
        private readonly int $minTrailingAboveDelta,
        private readonly int $maxTrailingAboveDelta,
        private readonly int $minTrailingBelowDelta,
        private readonly int $maxTrailingBelowDelta
    ) {
        parent::__construct($filterType);
    }

    protected function getClassFilterType(): string
    {
        return FilterConst::TRAILING_DELTA;
    }

    public function getMinTrailingAboveDelta(): int
    {
        return $this->minTrailingAboveDelta;
    }

    public function getMaxTrailingAboveDelta(): int
    {
        return $this->maxTrailingAboveDelta;
    }

    public function getMinTrailingBelowDelta(): int
    {
        return $this->minTrailingBelowDelta;
    }

    public function getMaxTrailingBelowDelta(): int
    {
        return $this->maxTrailingBelowDelta;
    }
}

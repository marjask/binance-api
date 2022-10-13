<?php

declare(strict_types=1);

namespace Binance\DTO\ExchangeInformation\Filter;

final class MaxNumAlgoOrdersFilter extends AbstractFilter
{
    public function __construct(
        string $filterType,
        private readonly int $maxNumAlgoOrders
    ) {
        parent::__construct($filterType);
    }

    protected function getClassFilterType(): string
    {
        return FilterConst::MAX_NUM_ALGO_ORDERS;
    }

    public function getMaxNumAlgoOrders(): int
    {
        return $this->maxNumAlgoOrders;
    }
}

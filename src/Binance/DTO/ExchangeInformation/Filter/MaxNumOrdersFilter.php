<?php

declare(strict_types=1);

namespace Binance\DTO\ExchangeInformation\Filter;

final class MaxNumOrdersFilter extends AbstractFilter
{
    public function __construct(
        string $filterType,
        private readonly int $maxNumOrders
    ) {
        parent::__construct($filterType);
    }

    public function getMaxNumOrders(): int
    {
        return $this->maxNumOrders;
    }
}

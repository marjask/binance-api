<?php

declare(strict_types=1);

namespace Binance\DTO\ExchangeInformation\Filter;

use Trait\ToArray\ToArrayTrait;

abstract class AbstractFilter
{
    use ToArrayTrait;

    public function __construct(
        private readonly string $filterType
    ) {
    }

    public function getFilterType(): string
    {
        return $this->filterType;
    }
}

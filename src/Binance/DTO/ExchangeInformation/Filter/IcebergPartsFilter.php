<?php

declare(strict_types=1);

namespace Binance\DTO\ExchangeInformation\Filter;

final class IcebergPartsFilter extends AbstractFilter
{
    public function __construct(
        string $filterType,
        private readonly int $limit
    ) {
        parent::__construct($filterType);
    }

    protected function getClassFilterType(): string
    {
        return FilterConst::ICEBERG_PARTS;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }
}

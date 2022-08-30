<?php

declare(strict_types=1);

namespace Binance\DTO\ExchangeInformation\Filter;

use Binance\Collection\AbstractCollection;

final class FilterCollection extends AbstractCollection
{
    protected function getCollectionType(): string
    {
        return AbstractFilter::class;
    }
}

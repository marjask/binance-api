<?php

declare(strict_types=1);

namespace Binance\DTO\Collection;

use Binance\Collection\AbstractCollection;
use Binance\DTO\CurrentOrderCountUsageDTO;

class CurrentOrderCountUsageDTOCollection extends AbstractCollection
{
    protected function getCollectionType(): string
    {
        return CurrentOrderCountUsageDTO::class;
    }
}

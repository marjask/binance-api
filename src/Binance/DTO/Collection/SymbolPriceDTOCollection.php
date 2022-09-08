<?php

declare(strict_types=1);

namespace Binance\DTO\Collection;

use Binance\Collection\AbstractCollection;
use Binance\DTO\SymbolPriceDTO;

final class SymbolPriceDTOCollection extends AbstractCollection
{
    protected function getCollectionType(): string
    {
        return SymbolPriceDTO::class;
    }
}

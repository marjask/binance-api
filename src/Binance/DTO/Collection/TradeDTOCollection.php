<?php

declare(strict_types=1);

namespace Binance\DTO\Collection;

use Binance\Collection\AbstractCollection;
use Binance\DTO\TradeDTO;

class TradeDTOCollection extends AbstractCollection
{
    protected function getCollectionType(): string
    {
        return TradeDTO::class;
    }
}

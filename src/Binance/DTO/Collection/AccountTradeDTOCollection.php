<?php

declare(strict_types=1);

namespace Binance\DTO\Collection;

use Binance\Collection\AbstractCollection;
use Binance\DTO\AccountTradeDTO;

class AccountTradeDTOCollection extends AbstractCollection
{
    protected function getCollectionType(): string
    {
        return AccountTradeDTO::class;
    }
}

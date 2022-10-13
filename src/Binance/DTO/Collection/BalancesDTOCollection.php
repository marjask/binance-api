<?php

declare(strict_types=1);

namespace Binance\DTO\Collection;

use Binance\Collection\AbstractCollection;
use Binance\DTO\BalanceDTO;

final class BalancesDTOCollection extends AbstractCollection
{
    protected function getCollectionType(): string
    {
        return BalanceDTO::class;
    }
}

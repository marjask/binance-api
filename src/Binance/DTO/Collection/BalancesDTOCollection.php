<?php

declare(strict_types=1);

namespace Binance\DTO\Collection;

use Binance\Collection\AbstractCollection;
use Binance\DTO\BalancesDTO;

final class BalancesDTOCollection extends AbstractCollection
{
    protected function getCollectionType(): string
    {
        return BalancesDTO::class;
    }
}

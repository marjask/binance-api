<?php

declare(strict_types=1);

namespace Binance\DTO\Collection;

use Binance\Collection\AbstractCollection;
use Binance\DTO\OrderDTO;

final class OrderDTOCollection extends AbstractCollection
{
    protected function getCollectionType(): string
    {
        return OrderDTO::class;
    }
}

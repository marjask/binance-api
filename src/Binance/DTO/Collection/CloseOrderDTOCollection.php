<?php

declare(strict_types=1);

namespace Binance\DTO\Collection;

use Binance\Collection\AbstractCollection;
use Binance\DTO\CancelOrderDTO;

final class CloseOrderDTOCollection extends AbstractCollection
{
    protected function getCollectionType(): string
    {
        return CancelOrderDTO::class;
    }
}

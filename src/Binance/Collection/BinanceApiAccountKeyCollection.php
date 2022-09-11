<?php

declare(strict_types=1);

namespace Binance\Collection;

use Binance\ValueObject\BinanceApiAccountKey;

final class BinanceApiAccountKeyCollection extends AbstractCollection
{
    protected function getCollectionType(): string
    {
        return BinanceApiAccountKey::class;
    }
}

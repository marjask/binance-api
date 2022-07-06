<?php

declare(strict_types=1);

namespace Binance\Collection;

use Binance\ValueObject\BinanceApiAccountDetails;

final class ApiBinanceAccountDetailsCollection extends AbstractCollection
{
    protected function getCollectionType(): string
    {
        return BinanceApiAccountDetails::class;
    }
}

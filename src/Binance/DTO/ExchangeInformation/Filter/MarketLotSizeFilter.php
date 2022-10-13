<?php

declare(strict_types=1);

namespace Binance\DTO\ExchangeInformation\Filter;

final class MarketLotSizeFilter extends LotSizeFilter
{
    protected function getClassFilterType(): string
    {
        return FilterConst::MARKET_LOT_SIZE;
    }
}

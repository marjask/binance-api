<?php

declare(strict_types=1);

namespace Binance\Query;

use Binance\ValueObject\Symbol;
use Trait\ToArray\ToArrayTrait;

final class CurrentAveragePriceQuery
{
    use ToArrayTrait;

    protected Symbol $symbol;

    public function getSymbol(): Symbol
    {
        return $this->symbol;
    }

    public function setSymbol(Symbol $symbol): self
    {
        $this->symbol = $symbol;

        return $this;
    }
}

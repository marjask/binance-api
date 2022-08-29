<?php

declare(strict_types=1);

namespace Binance\Query;

use Binance\ValueObject\Integer;
use Binance\ValueObject\Symbol;
use Trait\ToArray\ToArrayTrait;

final class RecentTradesListQuery
{
    use ToArrayTrait;

    protected Symbol $symbol;
    protected ?Integer $limit;

    public function getSymbol(): Symbol
    {
        return $this->symbol;
    }

    public function setSymbol(Symbol $symbol): self
    {
        $this->symbol = $symbol;

        return $this;
    }

    public function getLimit(): ?Integer
    {
        return $this->limit;
    }

    public function setLimit(?Integer $limit): self
    {
        $this->limit = $limit;

        return $this;
    }
}

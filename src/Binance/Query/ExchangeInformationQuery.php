<?php

declare(strict_types=1);

namespace Binance\Query;

use Binance\Collection\SymbolCollection;
use Binance\ValueObject\Symbol;
use Trait\ToArray\ToArrayTrait;

final class ExchangeInformationQuery
{
    use ToArrayTrait;

    protected ?Symbol $symbol;
    protected ?SymbolCollection $symbols;

    public function __construct()
    {
        $this->symbol = null;
        $this->symbols = null;
    }

    public function getSymbol(): ?Symbol
    {
        return $this->symbol;
    }

    public function setSymbol(?Symbol $symbol): self
    {
        $this->symbol = $symbol;

        return $this;
    }

    public function getSymbols(): ?SymbolCollection
    {
        return $this->symbols;
    }

    public function setSymbols(?SymbolCollection $symbols): self
    {
        $this->symbols = $symbols;

        return $this;
    }
}

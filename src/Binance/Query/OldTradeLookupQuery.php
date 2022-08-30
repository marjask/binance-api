<?php

declare(strict_types=1);

namespace Binance\Query;

use Binance\ValueObject\Id;
use Binance\ValueObject\Integer;
use Binance\ValueObject\Symbol;
use Trait\ToArray\ToArrayTrait;

final class OldTradeLookupQuery
{
    use ToArrayTrait;

    protected Symbol $symbol;
    protected ?Integer $limit;
    protected ?Id $fromId;

    public function __construct()
    {
        $this->limit = null;
        $this->fromId = null;
    }

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

    public function getFromId(): ?Id
    {
        return $this->fromId;
    }

    public function setFromId(?Id $fromId): self
    {
        $this->fromId = $fromId;

        return $this;
    }
}

<?php

declare(strict_types=1);

namespace Binance\Query;

use Binance\ValueObject\RecvWindow;
use Binance\ValueObject\Symbol;

class CurrentOpenOrdersQuery extends GeneralOrderQuery
{
    protected Symbol $symbol;
    protected ?RecvWindow $recvWindow;

    public function __construct()
    {
        parent::__construct();

        $this->recvWindow = null;
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

    public function getRecvWindow(): ?RecvWindow
    {
        return $this->recvWindow;
    }

    public function setRecvWindow(?RecvWindow $recvWindow): self
    {
        $this->recvWindow = $recvWindow;

        return $this;
    }
}

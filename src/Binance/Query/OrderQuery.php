<?php

declare(strict_types=1);

namespace Binance\Query;

use Binance\ValueObject\Id;
use Binance\ValueObject\RecvWindow;
use Binance\ValueObject\Symbol;
use Binance\ValueObject\Text;

final class OrderQuery extends GeneralOrderQuery
{
    protected Symbol $symbol;
    protected ?Id $orderId;
    protected ?Text $origClientOrderId;
    protected ?RecvWindow $recvWindow;

    public function __construct()
    {
        parent::__construct();

        $this->orderId = null;
        $this->origClientOrderId = null;
        $this->recvWindow = null;
    }

    public function getOrderId(): Id
    {
        return $this->orderId;
    }

    public function setOrderId(Id $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getOrigClientOrderId(): Text
    {
        return $this->origClientOrderId;
    }

    public function setOrigClientOrderId(Text $origClientOrderId): self
    {
        $this->origClientOrderId = $origClientOrderId;

        return $this;
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

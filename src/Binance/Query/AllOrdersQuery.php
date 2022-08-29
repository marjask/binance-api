<?php

declare(strict_types=1);

namespace Binance\Query;

use Binance\ValueObject\Integer;
use Binance\ValueObject\RecvWindow;
use Binance\ValueObject\Symbol;
use Binance\ValueObject\Timestamp;

class AllOrdersQuery extends GeneralOrderQuery
{
    protected Symbol $symbol;
    protected ?Integer $orderId;
    protected ?Timestamp $startTime;
    protected ?Timestamp $endTime;
    protected ?Integer $limit;
    protected ?RecvWindow $recvWindow;

    public function getSymbol(): Symbol
    {
        return $this->symbol;
    }

    public function setSymbol(Symbol $symbol): AllOrdersQuery
    {
        $this->symbol = $symbol;

        return $this;
    }

    public function getOrderId(): ?Integer
    {
        return $this->orderId;
    }

    public function setOrderId(?Integer $orderId): AllOrdersQuery
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getStartTime(): ?Timestamp
    {
        return $this->startTime;
    }

    public function setStartTime(?Timestamp $startTime): AllOrdersQuery
    {
        $this->startTime = $startTime;

        return $this;
    }

    public function getEndTime(): ?Timestamp
    {
        return $this->endTime;
    }

    public function setEndTime(?Timestamp $endTime): AllOrdersQuery
    {
        $this->endTime = $endTime;

        return $this;
    }

    public function getLimit(): ?Integer
    {
        return $this->limit;
    }

    public function setLimit(?Integer $limit): AllOrdersQuery
    {
        $this->limit = $limit;

        return $this;
    }

    public function getRecvWindow(): ?RecvWindow
    {
        return $this->recvWindow;
    }

    public function setRecvWindow(?RecvWindow $recvWindow): AllOrdersQuery
    {
        $this->recvWindow = $recvWindow;

        return $this;
    }
}

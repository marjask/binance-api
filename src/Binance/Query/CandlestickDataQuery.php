<?php

declare(strict_types=1);

namespace Binance\Query;

use Binance\ValueObject\Integer;
use Binance\ValueObject\Interval;
use Binance\ValueObject\Symbol;
use Binance\ValueObject\Timestamp;
use Trait\ToArray\ToArrayTrait;

final class CandlestickDataQuery
{
    use ToArrayTrait;

    protected Symbol $symbol;
    protected Interval $interval;
    protected ?Timestamp $startTime = null;
    protected ?Timestamp $endTime = null;
    protected ?Integer $limit = null;

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

    public function getInterval(): Interval
    {
        return $this->interval;
    }

    public function setInterval(Interval $interval): self
    {
        $this->interval = $interval;

        return $this;
    }

    public function getStartTime(): ?Timestamp
    {
        return $this->startTime;
    }

    public function setStartTime(?int $startTime): self
    {
        $this->startTime = $startTime;

        return $this;
    }

    public function getEndTime(): ?Timestamp
    {
        return $this->endTime;
    }

    public function setEndTime(?int $endTime): self
    {
        $this->endTime = $endTime;

        return $this;
    }
}

<?php

declare(strict_types=1);

namespace Binance\Command;

use Binance\ValueObject\RecvWindow;
use Binance\ValueObject\Symbol;
use Binance\ValueObject\Text;
use Binance\ValueObject\Timestamp;
use Trait\ToArray\ToArrayTrait;

abstract class AbstractOrderCommand
{
    use ToArrayTrait;

    protected Symbol $symbol;
    protected Timestamp $timestamp;
    protected ?Text $newClientOrderId;
    protected ?RecvWindow $recvWindow;

    public function __construct()
    {
        $this->setTimestamp(
            new Timestamp()
        );
    }

    final public function getSymbol(): Symbol
    {
        return $this->symbol;
    }

    final public function setSymbol(Symbol $symbol): self
    {
        $this->symbol = $symbol;

        return $this;
    }

    final public function getRecvWindow(): ?RecvWindow
    {
        return $this->recvWindow;
    }

    final public function setRecvWindow(?RecvWindow $recvWindow): self
    {
        $this->recvWindow = $recvWindow;

        return $this;
    }

    final public function getNewClientOrderId(): ?Text
    {
        return $this->newClientOrderId;
    }

    final public function setNewClientOrderId(?Text $newClientOrderId): self
    {
        $this->newClientOrderId = $newClientOrderId;

        return $this;
    }

    final public function getTimestamp(): Timestamp
    {
        return $this->timestamp;
    }

    final public function setTimestamp(Timestamp $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }
}

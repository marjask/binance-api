<?php

declare(strict_types=1);

namespace Binance\Command;

use Binance\ApiConst;
use Binance\ValueObject\IntVO;
use Binance\ValueObject\Price;
use Binance\ValueObject\RecvWindow;
use Binance\ValueObject\Text;
use InvalidArgumentException;

abstract class AbstractOrderCommand
{
    protected Text $symbol;
    protected ?Text $newClientOrderId;
    protected ?RecvWindow $recvWindow;
    protected IntVO $timestamp;

    public function __construct()
    {
        $this->setTimestamp(
            // @todo find better solution
            new IntVO((int)(time() . '000'))
        );
    }

    final public function getSymbol(): Text
    {
        return $this->symbol;
    }

    final public function setSymbol(Text $symbol): self
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


    final public function getTimestamp(): IntVO
    {
        return $this->timestamp;
    }

    final public function setTimestamp(IntVO $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getPreparedParams(): array
    {
        // @todo find better solution
        $params = [
            'symbol' => $this->getSymbol()->getValue(),
            'timestamp' => $this->getTimestamp()->getValue(),
        ];

        if ($this->getNewClientOrderId() instanceof Text) {
            $params['newClientOrderId'] = $this->getNewClientOrderId()->getValue();
        }

        if ($this->getRecvWindow() instanceof RecvWindow) {
            $params['recvWindow'] = $this->getRecvWindow()->getValue();
        }

        return $params;
    }

    public function throwIfInvalid(): void
    {
        if (
            in_array($this->getType()->getValue(), [
                ApiConst::ORDER_TYPE_LIMIT,
                ApiConst::ORDER_TYPE_STOP_LOSS_LIMIT,
                ApiConst::ORDER_TYPE_TAKE_PROFIT_LIMIT,
            ], true)
            && !($this->getPrice() instanceof Price)
        ) {
            throw new InvalidArgumentException('Wymagane pole price');
        }
    }
}

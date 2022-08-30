<?php

declare(strict_types=1);

namespace Binance\Command;

use Binance\ValueObject\Boolean;
use Binance\ValueObject\Id;
use Binance\ValueObject\Integer;
use Binance\ValueObject\OrderRespType;
use Binance\ValueObject\OrderSide;
use Binance\ValueObject\OrderType;
use Binance\ValueObject\Price;
use Binance\ValueObject\Real;
use Binance\ValueObject\StrategyType;
use Binance\ValueObject\TimeInForce;
use Trait\ToArray\ToArrayIgnore;

class NewOrderCommand extends AbstractOrderCommand
{
    protected OrderSide $side;
    protected OrderType $type;
    protected ?Real $quantity;
    #[ToArrayIgnore]
    protected ?Boolean $test;
    protected ?TimeInForce $timeInForce;
    protected ?Real $quoteOrderQty;
    protected ?Price $price;
    protected ?Price $stopPrice;
    protected ?Integer $trailingDelta;
    protected ?Real $icebergQty;
    protected ?OrderRespType $newOrderRespType;
    protected ?Id $strategyId;
    protected ?StrategyType $strategyType;

    public function __construct()
    {
        parent::__construct();

        $this->setTest(new Boolean(false));
    }

    final public function getSide(): ?OrderSide
    {
        return $this->side;
    }

    final public function setSide(?OrderSide $side): self
    {
        $this->side = $side;

        return $this;
    }

    final public function getQuantity(): ?Real
    {
        return $this->quantity;
    }

    final public function setQuantity(?Real $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    final public function getPrice(): ?Price
    {
        return $this->price;
    }

    final public function setPrice(?Price $price): self
    {
        $this->price = $price;

        return $this;
    }

    final public function getType(): ?OrderType
    {
        return $this->type;
    }

    final public function setType(?OrderType $type): self
    {
        $this->type = $type;

        return $this;
    }

    final public function getTest(): ?Boolean
    {
        return $this->test ?? null;
    }

    final public function setTest(?Boolean $test): self
    {
        $this->test = $test;

        return $this;
    }

    final public function getTimeInForce(): ?TimeInForce
    {
        return $this->timeInForce ?? null;
    }

    final public function setTimeInForce(?TimeInForce $timeInForce): self
    {
        $this->timeInForce = $timeInForce;

        return $this;
    }

    final public function getQuoteOrderQty(): ?Real
    {
        return $this->quoteOrderQty ?? null;
    }

    final public function setQuoteOrderQty(?Real $quoteOrderQty): self
    {
        $this->quoteOrderQty = $quoteOrderQty;

        return $this;
    }

    final public function getStopPrice(): ?Price
    {
        return $this->stopPrice ?? null;
    }

    final public function setStopPrice(?Price $stopPrice): self
    {
        $this->stopPrice = $stopPrice;

        return $this;
    }

    final public function getTrailingDelta(): ?Integer
    {
        return $this->trailingDelta ?? null;
    }

    final public function setTrailingDelta(?Integer $trailingDelta): self
    {
        $this->trailingDelta = $trailingDelta;

        return $this;
    }

    final public function getIcebergQty(): ?Real
    {
        return $this->icebergQty ?? null;
    }

    final public function setIcebergQty(?Real $icebergQty): self
    {
        $this->icebergQty = $icebergQty;

        return $this;
    }

    final public function getNewOrderRespType(): ?OrderRespType
    {
        return $this->newOrderRespType ?? null;
    }

    final public function setNewOrderRespType(?OrderRespType $newOrderRespType): self
    {
        $this->newOrderRespType = $newOrderRespType;

        return $this;
    }

    public function getStrategyId(): ?Id
    {
        return $this->strategyId ?? null;
    }

    public function setStrategyId(?Id $strategyId): NewOrderCommand
    {
        $this->strategyId = $strategyId;

        return $this;
    }

    public function getStrategyType(): ?StrategyType
    {
        return $this->strategyType ?? null;
    }

    public function setStrategyType(?StrategyType $strategyType): NewOrderCommand
    {
        $this->strategyType = $strategyType;

        return $this;
    }
}

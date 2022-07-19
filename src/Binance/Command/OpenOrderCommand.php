<?php

declare(strict_types=1);

namespace Binance\Command;

use Binance\ApiConst;
use Binance\Validator\Constraint\AlsoRequired;
use Binance\Validator\Constraint\AlsoRequiredFieldsIfValueIs;
use Binance\Validator\Constraint\AlsoRequiredOneFieldOfListIfValueIs;
use Binance\ValueObject\BooleanVO;
use Binance\ValueObject\IntVO;
use Binance\ValueObject\OrderRespType;
use Binance\ValueObject\OrderSide;
use Binance\ValueObject\OrderType;
use Binance\ValueObject\Price;
use Binance\ValueObject\FloatVO;
use Binance\ValueObject\Text;
use Symfony\Component\Validator\Constraints as Assert;

class OpenOrderCommand extends AbstractOrderCommand
{
    protected ?OrderSide $side;
    protected ?OrderType $type;
    protected ?FloatVO $quantity;
    protected ?BooleanVO $test;
    protected ?Text $timeInForce;
    protected ?FloatVO $quoteOrderQty;
    protected ?Price $price;
    protected ?Price $stopPrice;
    protected ?IntVO $trailingDelta;
    protected ?FloatVO $icebergQty;
    protected ?OrderRespType $newOrderRespType;

    public function __construct()
    {
        parent::__construct();

        $this->setTest(new BooleanVO(false));
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

    final public function getQuantity(): ?FloatVO
    {
        return $this->quantity;
    }

    final public function setQuantity(?FloatVO $quantity): self
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

    final public function getTest(): ?BooleanVO
    {
        return $this->test;
    }

    final public function setTest(?BooleanVO $test): self
    {
        $this->test = $test;

        return $this;
    }

    final public function getTimeInForce(): ?Text
    {
        return $this->timeInForce;
    }

    final public function setTimeInForce(?Text $timeInForce): self
    {
        $this->timeInForce = $timeInForce;

        return $this;
    }

    final public function getQuoteOrderQty(): ?FloatVO
    {
        return $this->quoteOrderQty;
    }

    final public function setQuoteOrderQty(?FloatVO $quoteOrderQty): self
    {
        $this->quoteOrderQty = $quoteOrderQty;

        return $this;
    }

    final public function getStopPrice(): ?Price
    {
        return $this->stopPrice;
    }

    final public function setStopPrice(?Price $stopPrice): self
    {
        $this->stopPrice = $stopPrice;

        return $this;
    }

    final public function getTrailingDelta(): ?IntVO
    {
        return $this->trailingDelta;
    }

    final public function setTrailingDelta(?IntVO $trailingDelta): self
    {
        $this->trailingDelta = $trailingDelta;

        return $this;
    }

    final public function getIcebergQty(): ?FloatVO
    {
        return $this->icebergQty;
    }

    final public function setIcebergQty(?FloatVO $icebergQty): self
    {
        $this->icebergQty = $icebergQty;

        return $this;
    }

    final public function getNewOrderRespType(): ?OrderRespType
    {
        return $this->newOrderRespType;
    }

    final public function setNewOrderRespType(?OrderRespType $newOrderRespType): self
    {
        $this->newOrderRespType = $newOrderRespType;

        return $this;
    }

    public function getValidators(): array
    {
        return array_merge(parent::getValidators(), [
            'type' => new Assert\Required([
                new Assert\NotNull(null, 'Parameter type should be not null.'),
                new Assert\Type('string', 'Parameter type must be {{ type }}.'),
                new AlsoRequiredFieldsIfValueIs([
                    'definedValue' => ApiConst::ORDER_TYPE_LIMIT,
                    'fields' => ['timeInForce', 'quantity', 'price'],
                ]),
                new AlsoRequiredOneFieldOfListIfValueIs([
                    'definedValue' => ApiConst::ORDER_TYPE_MARKET,
                    'fields' => ['quantity', 'quoteOrderQty'],
                ]),
                new AlsoRequiredFieldsIfValueIs([
                    'definedValue' => ApiConst::ORDER_TYPE_STOP_LOSS,
                    'fields' => ['quantity'],
                ]),
                new AlsoRequiredOneFieldOfListIfValueIs([
                    'definedValue' => ApiConst::ORDER_TYPE_STOP_LOSS,
                    'fields' => ['stopPrice', 'trailingDelta'],
                ]),
                new AlsoRequiredFieldsIfValueIs([
                    'definedValue' => ApiConst::ORDER_TYPE_STOP_LOSS_LIMIT,
                    'fields' => ['timeInForce', 'quantity', 'price'],
                ]),
                new AlsoRequiredOneFieldOfListIfValueIs([
                    'definedValue' => ApiConst::ORDER_TYPE_STOP_LOSS_LIMIT,
                    'fields' => ['stopPrice', 'trailingDelta'],
                ]),
                new AlsoRequiredFieldsIfValueIs([
                    'definedValue' => ApiConst::ORDER_TYPE_TAKE_PROFIT,
                    'fields' => ['quantity'],
                ]),
                new AlsoRequiredOneFieldOfListIfValueIs([
                    'definedValue' => ApiConst::ORDER_TYPE_TAKE_PROFIT_LIMIT,
                    'fields' => ['stopPrice', 'trailingDelta'],
                ]),
                new AlsoRequiredFieldsIfValueIs([
                    'definedValue' => ApiConst::ORDER_TYPE_LIMIT_MARKET,
                    'fields' => ['quantity', 'price'],
                ]),
            ]),
            'side' => new Assert\Required([
                new Assert\NotNull(null, 'Parameter order should be not null.'),
                new Assert\Type('string', 'Parameter order must be {{ type }}.'),
            ]),
            'quantity' => new Assert\Optional([
                new Assert\Type('numeric'),
            ]),
            'quoteOrderQty' => new Assert\Optional([
                new Assert\Type('numeric'),
            ]),
            'timeInForce' => new Assert\Optional([
                new Assert\Type('string'),
            ]),
            'price' => new Assert\Optional([
                new Assert\Type('numeric'),
            ]),
            'stopPrice' => new Assert\Optional([
                new Assert\Type('numeric', 'Parameter stopPrice must be {{ type }}.'),
                new AlsoRequired([
                    'fields' => ['type'],
                ]),
                new AlsoRequired([
                    'fields' => [
                        ApiConst::ORDER_TYPE_STOP_LOSS,
                        ApiConst::ORDER_TYPE_TAKE_PROFIT,
                        ApiConst::ORDER_TYPE_TAKE_PROFIT_LIMIT,
                        ApiConst::ORDER_TYPE_STOP_LOSS_LIMIT,
                    ],
                ]),
            ]),
            'trailingDelta' => new Assert\Optional([
                new Assert\Type('numeric'),
                new AlsoRequired([
                    'fields' => ['type'],
                ]),
                new AlsoRequired([
                    'fields' => [
                        ApiConst::ORDER_TYPE_STOP_LOSS,
                        ApiConst::ORDER_TYPE_TAKE_PROFIT,
                        ApiConst::ORDER_TYPE_TAKE_PROFIT_LIMIT,
                        ApiConst::ORDER_TYPE_STOP_LOSS_LIMIT,
                    ],
                ]),
            ]),
            'icebergQty' => new Assert\Optional([
                new Assert\Type('numeric'),
                new AlsoRequired([
                    'fields' => ['type'],
                ]),
                new AlsoRequired([
                    'fields' => [
                        ApiConst::ORDER_TYPE_LIMIT,
                        ApiConst::ORDER_TYPE_STOP_LOSS_LIMIT,
                        ApiConst::ORDER_TYPE_TAKE_PROFIT_LIMIT,
                    ],
                ]),
            ]),
            'newOrderRespType' => new Assert\Optional([
                new Assert\Type('string'),
            ]),
        ]);
    }

    protected function getIgnorePropertyList(): array
    {
        return array_merge(
            parent::getIgnorePropertyList(), [
                'test',
            ]
        );
    }
}

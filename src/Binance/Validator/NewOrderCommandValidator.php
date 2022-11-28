<?php

declare(strict_types=1);

namespace Binance\Validator;

use Binance\Validator\Constraints\InArray;
use Binance\Validator\Constraints\Option\OptionInArray;
use Binance\ValueObject\Real;
use Binance\ValueObject\Id;
use Binance\ValueObject\Integer;
use Binance\ValueObject\OrderRespType;
use Binance\ValueObject\OrderSide;
use Binance\ValueObject\OrderType;
use Binance\ValueObject\Price;
use Binance\ValueObject\StrategyType;
use Binance\ValueObject\TimeInForce;
use Marjask\ObjectValidator\Constraints\AlsoRequired;
use Marjask\ObjectValidator\Constraints\AlsoRequiredIfValueIs;
use Marjask\ObjectValidator\Constraints\AlsoRequiredOneOfIfValueIs;
use Marjask\ObjectValidator\Constraints\Option\OptionAlsoRequired;
use Marjask\ObjectValidator\Constraints\Option\OptionAlsoRequiredIfValueIs;
use Marjask\ObjectValidator\Constraints\Option\OptionAlsoRequiredOneOfIfValueIs;
use Marjask\ObjectValidator\Constraints\Option\OptionType;
use Marjask\ObjectValidator\Constraints\Option\OptionTypeOrNull;
use Marjask\ObjectValidator\Constraints\Type;
use Marjask\ObjectValidator\Constraints\TypeOrNull;

class NewOrderCommandValidator extends AbstractOrderCommandValidator
{
    public function loadConstraints(): void
    {
        parent::loadConstraints();

        $this->addConstraint('type',
            new Type(
                new OptionType(OrderType::class)
            ),
            new AlsoRequiredIfValueIs(
                new OptionAlsoRequiredIfValueIs(
                    expectedValue: OrderType::LIMIT, fields: ['timeInForce', 'quantity', 'price']
                )
            ),
            new AlsoRequiredOneOfIfValueIs(
                new OptionAlsoRequiredOneOfIfValueIs(
                    expectedValue: OrderType::MARKET, fields: ['quantity', 'quoteOrderQty']
                )
            ),
            new AlsoRequiredIfValueIs(
                new OptionAlsoRequiredIfValueIs(
                    expectedValue: OrderType::STOP_LOSS, fields: ['quantity']
                )
            ),
            new AlsoRequiredOneOfIfValueIs(
                new OptionAlsoRequiredOneOfIfValueIs(
                    expectedValue: OrderType::STOP_LOSS, fields: ['stopPrice', 'trailingDelta']
                )
            ),
            new AlsoRequiredIfValueIs(
                new OptionAlsoRequiredIfValueIs(
                    expectedValue: OrderType::STOP_LOSS_LIMIT, fields: ['timeInForce', 'quantity', 'price']
                )
            ),
            new AlsoRequiredOneOfIfValueIs(
                new OptionAlsoRequiredOneOfIfValueIs(
                    expectedValue: OrderType::STOP_LOSS_LIMIT, fields: ['stopPrice', 'trailingDelta']
                )
            ),
            new AlsoRequiredIfValueIs(
                new OptionAlsoRequiredIfValueIs(
                    expectedValue: OrderType::TAKE_PROFIT, fields: ['quantity']
                )
            ),
            new AlsoRequiredOneOfIfValueIs(
                new OptionAlsoRequiredOneOfIfValueIs(
                    expectedValue: OrderType::TAKE_PROFIT_LIMIT, fields: ['stopPrice', 'trailingDelta']
                )
            ),
            new AlsoRequiredIfValueIs(
                new OptionAlsoRequiredIfValueIs(
                    expectedValue: OrderType::LIMIT_MAKER, fields: ['quantity', 'price']
                )
            )
        )->addConstraint('side',
            new Type(
                new OptionType(OrderSide::class)
            )
        )->addConstraint('quantity',
            new TypeOrNull(
                new OptionTypeOrNull(Real::class)
            )
        )->addConstraint('quoteOrderQty',
            new TypeOrNull(
                new OptionTypeOrNull(Real::class)
            )
        )->addConstraint('timeInForce',
            new TypeOrNull(
                new OptionTypeOrNull(TimeInForce::class)
            )
        )->addConstraint('price',
            new TypeOrNull(
                new OptionTypeOrNull(Price::class)
            )
        )->addConstraint('stopPrice',
            new TypeOrNull(
                new OptionTypeOrNull(Price::class)
            ),
            new AlsoRequired(
                new OptionAlsoRequired(['type'])
            ),
            new InArray(
                new OptionInArray('type', [
                    OrderType::STOP_LOSS,
                    OrderType::TAKE_PROFIT,
                    OrderType::TAKE_PROFIT_LIMIT,
                    OrderType::STOP_LOSS_LIMIT,
                ])
            )
        )->addConstraint('trailingDelta',
            new TypeOrNull(
                new OptionTypeOrNull(Integer::class)
            ),
            new AlsoRequired(
                new OptionAlsoRequired(['type'])
            ),
            new InArray(
                new OptionInArray('type', [
                    OrderType::STOP_LOSS,
                    OrderType::TAKE_PROFIT,
                    OrderType::TAKE_PROFIT_LIMIT,
                    OrderType::STOP_LOSS_LIMIT,
                ])
            )
        )->addConstraint('icebergQty',
            new TypeOrNull(
                new OptionTypeOrNull(Real::class)
            ),
            new AlsoRequired(
                new OptionAlsoRequired(['type'])
            ),
            new InArray(
                new OptionInArray('type', [
                    OrderType::LIMIT,
                    OrderType::STOP_LOSS_LIMIT,
                    OrderType::TAKE_PROFIT_LIMIT,
                ])
            )
        )->addConstraint('newOrderRespType',
            new TypeOrNull(
                new OptionTypeOrNull(OrderRespType::class)
            )
        )->addConstraint('strategyId',
            new TypeOrNull(
                new OptionTypeOrNull(Id::class)
            )
        )->addConstraint('strategyType',
            new TypeOrNull(
                new OptionTypeOrNull(StrategyType::class)
            )
        );
    }
}

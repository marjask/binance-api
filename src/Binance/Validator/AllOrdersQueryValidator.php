<?php

declare(strict_types=1);

namespace Binance\Validator;

use Binance\Validator\Constraints\Option\OptionRange;
use Binance\Validator\Constraints\Range;
use Binance\ValueObject\Integer;
use Binance\ValueObject\RecvWindow;
use Binance\ValueObject\Symbol;
use Binance\ValueObject\Timestamp;
use Marjask\ObjectValidator\Constraints\Option\OptionType;
use Marjask\ObjectValidator\Constraints\Option\OptionTypeOrNull;
use Marjask\ObjectValidator\Constraints\Type;
use Marjask\ObjectValidator\Constraints\TypeOrNull;

class AllOrdersQueryValidator extends AbstractOrderQueryValidator
{
    public function loadConstraints(): void
    {
        parent::loadConstraints();

        $this->addConstraint('symbol',
            new Type(
                new OptionType(Symbol::class)
            )
        )->addConstraint('orderId',
            new TypeOrNull(
                new OptionTypeOrNull(Integer::class)
            )
        )->addConstraint('startTime',
            new TypeOrNull(
                new OptionTypeOrNull(Timestamp::class)
            )
        )->addConstraint('endTime',
            new TypeOrNull(
                new OptionTypeOrNull(Timestamp::class)
            )
        )->addConstraint('limit',
            new TypeOrNull(
                new OptionTypeOrNull(Integer::class)
            ),
            new Range(
                new OptionRange(0, 1000)
            )
        )->addConstraint('recvWindow',
            new TypeOrNull(
                new OptionTypeOrNull(RecvWindow::class)
            )
        );
    }
}

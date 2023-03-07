<?php

declare(strict_types=1);

namespace Binance\Validator;

use Binance\Validator\Constraints\Option\OptionRange;
use Binance\Validator\Constraints\Range;
use Binance\ValueObject\Integer;
use Binance\ValueObject\Interval;
use Binance\ValueObject\Symbol;
use Binance\ValueObject\Timestamp;
use Marjask\ObjectValidator\AbstractValidator;
use Marjask\ObjectValidator\Constraints\Option\OptionType;
use Marjask\ObjectValidator\Constraints\Option\OptionTypeOrNull;
use Marjask\ObjectValidator\Constraints\Type;
use Marjask\ObjectValidator\Constraints\TypeOrNull;

final class CandlestickDataQueryValidator extends AbstractValidator
{
    public function loadConstraints(): void
    {
        $this->addConstraint('symbol',
            new Type(
                new OptionType(Symbol::class)
            )
        )->addConstraint('interval',
            new Type(
                new OptionType(Interval::class)
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
        );
    }
}

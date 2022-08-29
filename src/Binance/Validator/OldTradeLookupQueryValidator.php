<?php

declare(strict_types=1);

namespace Binance\Validator;

use Binance\Validator\Constraints\Option\OptionRange;
use Binance\Validator\Constraints\Range;
use Binance\ValueObject\Id;
use Binance\ValueObject\Integer;
use Binance\ValueObject\Symbol;
use Marjask\ObjectValidator\AbstractValidator;
use Marjask\ObjectValidator\Constraints\Option\OptionType;
use Marjask\ObjectValidator\Constraints\Option\OptionTypeOrNull;
use Marjask\ObjectValidator\Constraints\Type;
use Marjask\ObjectValidator\Constraints\TypeOrNull;

class OldTradeLookupQueryValidator extends AbstractValidator
{
    public function loadConstraints(): void
    {
        $this->addConstraint('symbol',
            new Type(
                new OptionType(Symbol::class)
            )
        )->addConstraint('limit',
            new TypeOrNull(
                new OptionTypeOrNull(Integer::class)
            ),
            new Range(
                new OptionRange(0, 1000)
            )
        )->addConstraint('fromId',
            new TypeOrNull(
                new OptionTypeOrNull(Id::class)
            )
        );
    }
}

<?php

declare(strict_types=1);

namespace Binance\Validator;

use Binance\ValueObject\Symbol;
use Marjask\ObjectValidator\AbstractValidator;
use Marjask\ObjectValidator\Constraints\Option\OptionType;
use Marjask\ObjectValidator\Constraints\Type;

class CurrentAveragePriceQueryValidator extends AbstractValidator
{
    public function loadConstraints(): void
    {
        $this->addConstraint('symbol',
            new Type(
                new OptionType(Symbol::class)
            )
        );
    }
}

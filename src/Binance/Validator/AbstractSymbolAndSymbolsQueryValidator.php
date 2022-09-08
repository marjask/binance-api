<?php

declare(strict_types=1);

namespace Binance\Validator;

use Binance\Collection\SymbolCollection;
use Binance\ValueObject\Symbol;
use Marjask\ObjectValidator\AbstractValidator;
use Marjask\ObjectValidator\Constraints\Option\OptionTypeOrNull;
use Marjask\ObjectValidator\Constraints\TypeOrNull;

abstract class AbstractSymbolAndSymbolsQueryValidator extends AbstractValidator
{
    public function loadConstraints(): void
    {
        $this->addConstraint('symbol',
            new TypeOrNull(
                new OptionTypeOrNull(Symbol::class)
            )
        )->addConstraint('symbols',
            new TypeOrNull(
                new OptionTypeOrNull(SymbolCollection::class)
            )
        );
    }
}

<?php

declare(strict_types=1);

namespace Binance\Validator;

use Binance\ValueObject\Symbol;
use Marjask\ObjectValidator\Constraints\Option\OptionTypeOrNull;
use Marjask\ObjectValidator\Constraints\TypeOrNull;

class CurrentOpenOrdersQueryValidator extends AbstractOrderQueryValidator
{
    public function loadConstraints(): void
    {
        parent::loadConstraints();

        $this->addConstraint('symbol',
            new TypeOrNull(
                new OptionTypeOrNull(Symbol::class)
            )
        );
    }
}

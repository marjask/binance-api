<?php

declare(strict_types=1);

namespace Binance\Validator;

use Binance\ValueObject\Id;
use Marjask\ObjectValidator\Constraints\Option\OptionTypeOrNull;
use Marjask\ObjectValidator\Constraints\TypeOrNull;

class AccountTradeListQueryValidator extends AllOrdersQueryValidator
{
    public function loadConstraints(): void
    {
        parent::loadConstraints();

        $this->addConstraint('fromId',
            new TypeOrNull(
                new OptionTypeOrNull(Id::class)
            )
        );
    }
}

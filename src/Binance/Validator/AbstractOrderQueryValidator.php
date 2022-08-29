<?php

declare(strict_types=1);

namespace Binance\Validator;

use Binance\ValueObject\Timestamp;
use Marjask\ObjectValidator\AbstractValidator;
use Marjask\ObjectValidator\Constraints\Option\OptionType;
use Marjask\ObjectValidator\Constraints\Type;

abstract class AbstractOrderQueryValidator extends AbstractValidator
{
    public function loadConstraints(): void
    {
        $this->addConstraint('timestamp',
            new Type(
                new OptionType(Timestamp::class)
            )
        );
    }
}

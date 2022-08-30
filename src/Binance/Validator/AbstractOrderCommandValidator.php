<?php

declare(strict_types=1);

namespace Binance\Validator;

use Binance\ValueObject\RecvWindow;
use Binance\ValueObject\Symbol;
use Binance\ValueObject\Text;
use Binance\ValueObject\Timestamp;
use Marjask\ObjectValidator\AbstractValidator;
use Marjask\ObjectValidator\Constraints\Option\OptionType;
use Marjask\ObjectValidator\Constraints\Option\OptionTypeOrNull;
use Marjask\ObjectValidator\Constraints\Type;
use Marjask\ObjectValidator\Constraints\TypeOrNull;

abstract class AbstractOrderCommandValidator extends AbstractValidator
{
    public function loadConstraints(): void
    {
        $this->addConstraint('symbol',
            new Type(
                new OptionType(Symbol::class)
            )
        )
        ->addConstraint('timestamp',
            new Type(
                new OptionType(Timestamp::class)
            )
        )
        ->addConstraint('newClientOrderId',
            new TypeOrNull(
                new OptionTypeOrNull(Text::class)
            )
        )
        ->addConstraint('recvWindow',
            new TypeOrNull(
                new OptionTypeOrNull(RecvWindow::class)
            )
        );
    }
}

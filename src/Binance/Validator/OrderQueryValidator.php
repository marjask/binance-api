<?php

declare(strict_types=1);

namespace Binance\Validator;

use Binance\ValueObject\Id;
use Binance\ValueObject\RecvWindow;
use Binance\ValueObject\Symbol;
use Binance\ValueObject\Text;
use Marjask\ObjectValidator\Constraints\AtLeast;
use Marjask\ObjectValidator\Constraints\Option\OptionAtLeast;
use Marjask\ObjectValidator\Constraints\Option\OptionType;
use Marjask\ObjectValidator\Constraints\Option\OptionTypeOrNull;
use Marjask\ObjectValidator\Constraints\Type;
use Marjask\ObjectValidator\Constraints\TypeOrNull;

class OrderQueryValidator extends AbstractOrderQueryValidator
{
    public function loadConstraints(): void
    {
        parent::loadConstraints();

        $this->addConstraint('orderId',
            new TypeOrNull(
                new OptionTypeOrNull(Id::class)
            )
        )->addConstraint('origClientOrderId',
            new TypeOrNull(
                new OptionTypeOrNull(Text::class)
            )
        )->addConstraint('symbol',
            new Type(
                new OptionType(Symbol::class)
            ),
            new AtLeast(
                new OptionAtLeast(['orderId', 'origClientOrderId'])
            )
        )->addConstraint('recvWindow',
            new TypeOrNull(
                new OptionTypeOrNull(RecvWindow::class)
            )
        );
    }
}

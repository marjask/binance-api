<?php

declare(strict_types=1);

namespace Binance\Validator;

use Binance\ValueObject\RecvWindow;
use Marjask\ObjectValidator\Constraints\Option\OptionTypeOrNull;
use Marjask\ObjectValidator\Constraints\TypeOrNull;

class AccountInformationQueryValidator extends AbstractOrderQueryValidator
{
    public function loadConstraints(): void
    {
        parent::loadConstraints();

        $this->addConstraint('recvWindow',
            new TypeOrNull(
                new OptionTypeOrNull(RecvWindow::class)
            )
        );
    }
}

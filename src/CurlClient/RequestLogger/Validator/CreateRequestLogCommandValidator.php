<?php

declare(strict_types=1);

namespace CurlClient\RequestLogger\Validator;

use Binance\Validator\Constraints\InArray;
use Binance\Validator\Constraints\Option\OptionInArray;
use CurlClient\CurlClientConst;
use DateTime;
use Marjask\ObjectValidator\AbstractValidator;
use Marjask\ObjectValidator\Constraints\Option\OptionType;
use Marjask\ObjectValidator\Constraints\Option\OptionTypeOrNull;
use Marjask\ObjectValidator\Constraints\Type;
use Marjask\ObjectValidator\Constraints\TypeOrNull;

final class CreateRequestLogCommandValidator extends AbstractValidator
{
    public function loadConstraints(): void
    {
        $this->addConstraint('debug',
            new Type(
                new OptionType('bool')
            )
        )->addConstraint('timeout',
            new Type(
                new OptionType('int')
            )
        )->addConstraint('method',
            new Type(
                new OptionType('string')
            ),
            new InArray(
                new OptionInArray('method', CurlClientConst::METHODS)
            )
        )->addConstraint('parameters',
            new Type(
                new OptionType('array')
            )
        )->addConstraint('query',
            new Type(
                new OptionType('string')
            )
        )->addConstraint('path',
            new Type(
                new OptionType('string')
            )
        )->addConstraint('response',
            new Type(
                new OptionType('string')
            )
        )->addConstraint('dateTime',
            new Type(
                new OptionType(DateTime::class)
            )
        )->addConstraint('error',
            new TypeOrNull(
                new OptionTypeOrNull('string')
            )
        )->addConstraint('responseCode',
            new Type(
                new OptionType('int')
            )
        );
    }
}

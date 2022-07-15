<?php

declare(strict_types=1);

namespace Binance\Validator\Constraint;

use Symfony\Component\Validator\Constraint;

class AlsoRequiredFieldsIfValueIs extends Constraint
{
    public string $message = 'Required also field %s when value: %s';

    public array $fields = [];

    public ?string $definedValue = null;
}

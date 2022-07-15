<?php

declare(strict_types=1);

namespace Binance\Validator\Constraint;

use Symfony\Component\Validator\Constraint;

class AlsoRequiredOneFieldOfListIfValueIs extends Constraint
{
    public string $message = 'Required also one of fields: %s, when value: %s';

    public array $fields = [];

    public ?string $definedValue = null;
}

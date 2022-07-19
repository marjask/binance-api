<?php

declare(strict_types=1);

namespace Binance\Validator\Constraint;

use Symfony\Component\Validator\Constraint;

class AtLeastOneOfFields extends Constraint
{
    public string $message = 'At least one of the fields: %s is required.';

    public array $fields = [];
}

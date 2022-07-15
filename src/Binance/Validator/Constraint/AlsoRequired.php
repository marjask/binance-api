<?php

declare(strict_types=1);

namespace Binance\Validator\Constraint;

use Symfony\Component\Validator\Constraint;

class AlsoRequired extends Constraint
{
    public string $message = 'Required also fields: %s';

    public array $fields = [];
}

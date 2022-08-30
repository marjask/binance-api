<?php

declare(strict_types=1);

namespace Binance\Validator\Constraints\Option;

use Marjask\ObjectValidator\Constraints\Option\AbstractOption;

class OptionInArray extends AbstractOption
{
    public function __construct(
        private readonly string $field,
        private readonly array $values,
        ?string $customMessage = null,
        ?array $messageParameters = null
    ) {
        parent::__construct($customMessage, $messageParameters);
    }

    public function getField(): string
    {
        return $this->field;
    }

    public function getValues(): array
    {
        return $this->values;
    }
}

<?php

declare(strict_types=1);

namespace Binance\Validator\Constraints;

use Binance\Validator\Constraints\Option\OptionRange;
use Binance\ValueObject\AbstractValueObject;
use InvalidArgumentException;
use Marjask\ObjectValidator\Constraints\AbstractConstraint;
use Marjask\ObjectValidator\ConstraintViolation;
use Marjask\ObjectValidator\ConstraintViolationList;
use Marjask\ObjectValidator\Exception\UnexpectedTypeException;

class Range extends AbstractConstraint
{
    private const MESSAGE = 'The %s field must be between %d and %d.';

    public function validate(mixed $input, string $parameter): ConstraintViolationList
    {
        if (!$this->option instanceof OptionRange) {
            throw new UnexpectedTypeException($this->option, OptionRange::class);
        }

        $value = $this->getValue($input, $parameter);
        $value = $value instanceof AbstractValueObject ? $value->getValue() : $value;

        if (is_null($value)) {
            // possible nullable parameter
            return $this->violations;
        }

        if (!is_numeric($value)) {
            throw new InvalidArgumentException('Value must be numeric');
        }

        if (!is_null($this->option->getMin()) && $this->option->getMin() > $value) {
            $this->violations->addViolation(
                new ConstraintViolation(
                    $this->getMessage(
                        self::MESSAGE,
                        $parameter,
                        $this->option->getMin(),
                        $this->option->getMax()
                    ),
                    $parameter,
                    $this
                )
            );
        }

        if (!is_null($this->option->getMax()) && $this->option->getMax() < $value) {
            $this->violations->addViolation(
                new ConstraintViolation(
                    $this->getMessage(
                        self::MESSAGE,
                        $parameter,
                        $this->option->getMin(),
                        $this->option->getMax()
                    ),
                    $parameter,
                    $this
                )
            );
        }

        return $this->violations;
    }
}

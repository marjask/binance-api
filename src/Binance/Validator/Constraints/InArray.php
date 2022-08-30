<?php

declare(strict_types=1);

namespace Binance\Validator\Constraints;

use Binance\Validator\Constraints\Option\OptionInArray;
use Marjask\ObjectValidator\Constraints\AbstractConstraint;
use Marjask\ObjectValidator\ConstraintViolation;
use Marjask\ObjectValidator\ConstraintViolationList;
use Marjask\ObjectValidator\Exception\UnexpectedTypeException;
use ReflectionClass;
use ReflectionException;

class InArray extends AbstractConstraint
{
    private const MESSAGE = 'The %s field value must be one of the following: %s.';

    public function validate(mixed $input, string $parameter): ConstraintViolationList
    {
        if (!$this->option instanceof OptionInArray) {
            throw new UnexpectedTypeException($this->option, OptionInArray::class);
        }

        $value = $this->getValue($input, $parameter);
        if (
            is_null($value)
            && $this->isPropertyNullable($input, $parameter)
        ) {
            return $this->violations;
        }

        $valueField = (string) $this->getValue($input, $this->option->getField());

        if (!in_array($valueField, $this->option->getValues(), true)) {
            $this->violations->addViolation(
                new ConstraintViolation(
                    $this->getMessage(
                        self::MESSAGE,
                        $this->option->getField(),
                        implode(',', $this->option->getValues())
                    ),
                    $parameter,
                    $this
                )
            );
        }

        return $this->violations;
    }

    /**
     * @throws ReflectionException
     */
    private function isPropertyNullable(mixed $input, string $parameter): bool
    {
        if (!is_object($input)) {
            return false;
        }

        $class = new ReflectionClass($input);
        $property = $class->getProperty($parameter);

        return $property->hasType() && $property->getType()->allowsNull();
    }
}

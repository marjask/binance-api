<?php

declare(strict_types=1);

namespace Binance\Validator\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class AlsoRequiredOneFieldOfListIfValueIsValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint): void
    {
        if (!$constraint instanceof AlsoRequiredOneFieldOfListIfValueIs) {
            throw new UnexpectedTypeException($constraint, AlsoRequiredOneFieldOfListIfValueIs::class);
        }

        if (empty($constraint->definedValue)) {
            $this->context->buildViolation('Defined value is empty')
                ->addViolation();

            return;
        }

        if ($value !== $constraint->definedValue) {
            return;
        }

        if (empty($constraint->fields)) {
            $this->context->buildViolation('Empty required fields')
                ->addViolation();

            return;
        }

        $root = $this->context->getRoot();

        foreach ($constraint->fields as $field) {
            if (array_key_exists($field, $root)) {
                return;
            }
        }

        $this->context
            ->buildViolation(
                sprintf($constraint->message, implode(', ', $constraint->fields), $value)
            )
            ->addViolation();
    }
}

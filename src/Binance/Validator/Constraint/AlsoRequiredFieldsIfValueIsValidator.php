<?php

declare(strict_types=1);

namespace Binance\Validator\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class AlsoRequiredFieldsIfValueIsValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint): void
    {
        if (!$constraint instanceof AlsoRequiredFieldsIfValueIs) {
            throw new UnexpectedTypeException($constraint, AlsoRequiredFieldsIfValueIs::class);
        }

        if (empty($constraint->fields)) {
            $this->context->buildViolation('Empty required fields')
                ->addViolation();

            return;
        }

        if (empty($constraint->definedValue)) {
            $this->context->buildViolation('Defined value is empty')
                ->addViolation();

            return;
        }

        if ($value !== $constraint->definedValue) {
            return;
        }

        $root = $this->context->getRoot();
        $missingFields = array_diff_key(
            array_flip($constraint->fields),
            $root
        );

        if (!empty($missingFields)) {
            $missingFields = array_flip($missingFields);
            $this->context
                ->buildViolation(
                    sprintf($constraint->message, implode(', ', $missingFields), $value)
                )
                ->addViolation();
        }
    }
}

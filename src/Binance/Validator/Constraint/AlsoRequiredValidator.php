<?php

declare(strict_types=1);

namespace Binance\Validator\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class AlsoRequiredValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint): void
    {
        if (!$constraint instanceof AlsoRequired) {
            throw new UnexpectedTypeException($constraint, AlsoRequired::class);
        }

        if (empty($constraint->fields)) {
            $this->context->buildViolation('Empty required fields')
                ->addViolation();

            return;
        }

        $root = $this->context->getRoot();

        foreach ($constraint->fields as $fieldName) {
            if (!array_key_exists($fieldName, $root)) {
                $this->context->buildViolation(sprintf($constraint->message, $fieldName))
                    ->addViolation();

                return;
            }

            if ($root[$fieldName] !== null) {
                return;
            }
        }

        $this->context->buildViolation(
            sprintf($constraint->message, implode(', ', $constraint->fields))
        )->addViolation();
    }
}

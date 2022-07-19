<?php

declare(strict_types=1);

namespace Binance\Validator\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class AtLeastOneOfFieldsValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint): void
    {
        if (!$constraint instanceof AtLeastOneOfFields) {
            throw new UnexpectedTypeException($constraint, AtLeastOneOfFields::class);
        }

        if (empty($constraint->fields)) {
            $this->context->buildViolation('Empty required fields')
                ->addViolation();

            return;
        }

        $root = $this->context->getRoot();

        foreach ($constraint->fields as $field) {
            if (array_key_exists($field, $root) && $root[$field] !== null) {
                return;
            }
        }

        $this->context->buildViolation(
            sprintf($constraint->message, implode(', ', $constraint->fields))
        )->addViolation();
    }
}

<?php

declare(strict_types=1);

namespace Binance\Validator;

use Exception;
use RuntimeException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\RecursiveValidator;

abstract class AbstractValidator
{
    public function validate(): array
    {
        /**
         * TODO: make validation more elegant!
         */

        /** @var RecursiveValidator $validator */
        $validator = Validation::createValidatorBuilder()
            ->getValidator();
//        dump($this->getValidators(), $this->getPreparedParams());
        $violations = $validator->validate(
            $this->getPreparedParams(),
            new Collection($this->getValidators())
        );

        dump($violations);
        exit;
        /** @var ConstraintViolation $violation */
        foreach ($violations as $violation) {
            $propertyAccessor->setValue(
                $errors,
                $violation->getPropertyPath(),
                $this->getMessageForViolation($violation)
            );
        }

        foreach ($errors as $key => $error) {
            $errors[$key] = [$error];
        }

        return $errors;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function isValid(array $requestBody): bool
    {
        return empty($this->validate($requestBody));
    }

    /**
     * @throws Exception
     */
    public function throwIfRequestBodyIsNotValid(array $requestBody): void
    {
        if (!$this->isValid($requestBody)) {
            throw new Exception(implode(', ', $this->getErrors()));
        }
    }

    abstract public function getValidators(): array;

    abstract public function getPreparedParams(): array;

    private function getMessageForViolation(ConstraintViolation $violation): string
    {
        $message = $violation->getMessage();
        $constraint = $violation->getConstraint();

        if ($constraint instanceof DateTime) {
            /** @var DateTime $constraint */
            $message .= " (Format: {$constraint->format})";
        }

        return $message;
    }

    private function throwIfPropertyNotExists(string $propertyName): void
    {
        if (!property_exists($this, $propertyName)) {
            throw new RuntimeException(
                sprintf('Property don\'t exists ' . "get%s()", $propertyName)
            );
        }
    }

    private function throwIfEmptyConstraints(null|array|Constraint $constraint, string $property): void
    {
        if (empty($constraint)) {
            throw new RuntimeException(sprintf('Constraints not exists for %s.', $property));
        }
    }

//    public static function loadValidatorMetadata(ClassMetadata $metadata): void
//    {
//        foreach (static::getValidators() as $property => $constraint) {
//            $metadata->addPropertyConstraint($property, $constraint);
//        }
//    }
}

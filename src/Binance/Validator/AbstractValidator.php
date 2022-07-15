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
    final public function validate(): array
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

        $errors = [];
        /** @var ConstraintViolation $violation */
        foreach ($violations as $violation) {
            $errors[] = $violation->getMessage();
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
}

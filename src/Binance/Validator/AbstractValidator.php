<?php

declare(strict_types=1);

namespace Binance\Validator;

use RuntimeException;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\RecursiveValidator;
use Trait\ToArrayTrait;

abstract class AbstractValidator
{
    use ToArrayTrait;

    private array $errors = [];

    abstract public function getValidators(): array;

    final public function getParams(): array
    {
        return $this->toArray();
    }

    final public function validate(): array
    {
        /**
         * TODO: make validation more elegant!
         */

        /** @var RecursiveValidator $validator */
        $validator = Validation::createValidatorBuilder()
            ->getValidator();

        $violations = $validator->validate(
            $this->getParams(),
            new Collection($this->getValidators())
        );

        $errors = [];
        /** @var ConstraintViolation $violation */
        foreach ($violations as $violation) {
            $errors[] = $violation->getMessage();
        }

        return $this->errors = $errors;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function isValid(): bool
    {
        return empty($this->validate());
    }

    /**
     * @throws RuntimeException
     */
    public function throwIfObjectIsNotValid(): void
    {
        if (!$this->isValid()) {
            throw new RuntimeException(implode(', ', $this->getErrors()));
        }
    }
}

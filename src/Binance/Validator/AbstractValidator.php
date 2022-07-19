<?php

declare(strict_types=1);

namespace Binance\Validator;

use RuntimeException;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\RecursiveValidator;
use Trait\ToArrayTrait;

abstract class AbstractValidator
{
    use ToArrayTrait;

    private array $errors;

    private ConstraintViolationListInterface $violations;

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

        $this->violations = $validator->validate(
            $this->getParams(),
            new Collection(
                $this->getValidators()
            )
        );

        $errors = [];
        /** @var ConstraintViolation $violation */
        foreach ($this->violations as $violation) {
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

    public function getViolations(): ConstraintViolationListInterface
    {
        return $this->violations;
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

    protected function getIgnorePropertyList(): array
    {
        return [
            'errors',
            'violations',
        ];
    }
}

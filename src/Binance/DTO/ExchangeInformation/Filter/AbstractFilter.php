<?php

declare(strict_types=1);

namespace Binance\DTO\ExchangeInformation\Filter;

use Trait\ToArray\ToArrayTrait;

abstract class AbstractFilter
{
    use ToArrayTrait;

    abstract protected function getClassFilterType(): string;

    public function __construct(
        protected readonly string $filterType
    ) {
        $this->throwIfInvalidFilterType();
    }

    public function getFilterType(): string
    {
        return $this->filterType;
    }

    private function throwIfInvalidFilterType(): void
    {
        if ($this->getFilterType() !== $this->getClassFilterType()) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Invalid filterType: %s. Expected: %s',
                    $this->getFilterType(),
                    $this->getClassFilterType()
                )
            );
        }
    }
}

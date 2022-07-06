<?php

declare(strict_types=1);

namespace Binance\Collection;

use InvalidArgumentException;

abstract class AbstractCollection
{
    protected array $collection = [];
    protected string $collectionType;

    abstract protected function getCollectionType(): string;

    public function addToCollection($collectionItem, $key = null): self
    {
        $this->checkIfDoesMatchCollectionType($collectionItem);

        if (null === $key) {
            $this->collection[] = $collectionItem;
        } else {
            $this->collection[$key] = $collectionItem;
        }

        return $this;
    }

    private function checkIfDoesMatchCollectionType($collectionItem): void
    {
        if (!$collectionItem instanceof $this->collectionType) {
            throw new InvalidArgumentException(sprintf(
                'CollectionItem must be typeof %s. Given: %s',
                $this->collectionType,
                is_object($collectionItem)
                    ? get_class($collectionItem) : gettype($collectionItem)
            ));
        }
    }
}

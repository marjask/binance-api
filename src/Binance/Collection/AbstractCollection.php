<?php

declare(strict_types=1);

namespace Binance\Collection;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use RuntimeException;
use Trait\ToArray\ToArrayTrait;

abstract class AbstractCollection implements Countable, IteratorAggregate
{
    use ToArrayTrait;

    protected array $collection = [];
    private string $collectionType;

    abstract protected function getCollectionType(): string;

    final public function __construct()
    {
        $this->collectionType = $this->getCollectionType();

        if (!class_exists($this->collectionType)
            && !interface_exists($this->collectionType)
        ) {
            throw new RuntimeException(
                "Class/interface \"$this->collectionType\" doesn't exists."
            );
        }
    }

    public static function fromArray(array $items): static
    {
        $collection = new static();

        foreach ($items as $item) {
            $collection->add($item);
        }

        return $collection;
    }

    public function asArray(): array
    {
        return $this->collection;
    }

    public function count(): int
    {
        return count($this->collection);
    }

    public function isEmpty(): bool
    {
        return empty($this->collection);
    }

    public function mergeWith(self $other): static
    {
        return self::fromArray(
            array_merge(
                $this->asArray(),
                $other->asArray()
            )
        );
    }

    public function add($item): void
    {
        $this->throwIfInvalidCollectionType($item);

        $this->collection[] = $item;
    }

    public function first(): mixed
    {
        return reset($this->collection);
    }

    public function last(): mixed
    {
        return end($this->collection);
    }

    final public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->collection);
    }

    private function throwIfInvalidCollectionType($item): void
    {
        if (!$item instanceof $this->collectionType) {
            throw new RuntimeException(
                sprintf(
                    'CollectionItem must be typeof %s. Given: %s',
                    $this->collectionType,
                    is_object($item) ? get_class($item) : gettype($item)
                )
            );
        }
    }
}

<?php

declare(strict_types=1);

namespace Binance\Collection;

use Binance\ValueObject\OrderType;

class OrderTypeCollection extends AbstractCollection
{
    protected function getCollectionType(): string
    {
        return OrderType::class;
    }

    public static function createFromStringArray(array $data): self
    {
        $collection = new self();

        foreach ($data as $item) {
            $collection->add(
                new OrderType($item)
            );
        }

        return $collection;
    }
}

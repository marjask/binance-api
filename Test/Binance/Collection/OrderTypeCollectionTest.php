<?php

declare(strict_types=1);

namespace Test\Binance\Collection;

use Binance\Collection\OrderTypeCollection;
use Binance\ValueObject\OrderType;
use PHPUnit\Framework\TestCase;

final class OrderTypeCollectionTest extends TestCase
{
    public function testCreateFromStringArray(): void
    {
        $collection = OrderTypeCollection::createFromStringArray([
            'LIMIT',
            'MARKET',
        ]);

        $this->assertInstanceOf(OrderType::class, $collection->first());
        $this->assertInstanceOf(OrderType::class, $collection->last());
        $this->assertSame('LIMIT', $collection->first()->getValue());
        $this->assertSame('MARKET', $collection->last()->getValue());
    }
}

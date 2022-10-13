<?php

declare(strict_types=1);

namespace Test\Binance\Collection;

use Binance\Collection\BinanceApiAccountKeyCollection;
use Binance\ValueObject\BinanceApiAccountKey;
use PHPUnit\Framework\TestCase;

final class BinanceApiAccountKeyCollectionTest extends TestCase
{
    public function testOneElement(): void
    {
        $collection = new BinanceApiAccountKeyCollection();
        $collection->add(
            new BinanceApiAccountKey('test', 'test')
        );

        $this->assertInstanceOf(BinanceApiAccountKeyCollection::class, $collection);
        $this->assertInstanceOf(BinanceApiAccountKey::class, $collection->first());
    }
}

<?php

declare(strict_types=1);

namespace Test\Binance\Collection;

use Binance\Collection\SymbolCollection;
use Binance\ValueObject\Symbol;
use PHPUnit\Framework\TestCase;

final class SymbolCollectionTest extends TestCase
{
    public function testToString(): void
    {
        $collection = SymbolCollection::fromArray([
            Symbol::fromString('TEST'),
            Symbol::fromString('TEST123'),
        ]);

        $this->assertSame('["TEST","TEST123"]', $collection->toString());
    }
}

<?php

declare(strict_types=1);

namespace Binance\Collection;

use Binance\ValueObject\Symbol;

class SymbolCollection extends AbstractCollection
{
    protected function getCollectionType(): string
    {
        return Symbol::class;
    }

    public function toString(): string
    {
        return sprintf(
            '[%s]',
            implode(',', array_map(static function(Symbol $symbol): string {
                return sprintf('"%s"', $symbol);
            }, $this->collection))
        );
    }
}

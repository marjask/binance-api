<?php

declare(strict_types=1);

namespace Binance\Collection;

use Binance\ValueObject\Text;

class TextCollection extends AbstractCollection
{
    protected function getCollectionType(): string
    {
        return Text::class;
    }
}

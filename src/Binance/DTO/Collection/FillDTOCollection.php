<?php

declare(strict_types=1);

namespace Binance\DTO\Collection;

use Binance\Collection\AbstractCollection;
use Binance\DTO\NewOrder\FillDTO;

final class FillDTOCollection extends AbstractCollection
{
    protected function getCollectionType(): string
    {
        return FillDTO::class;
    }
}

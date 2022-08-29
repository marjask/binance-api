<?php

declare(strict_types=1);

namespace Binance\DTO\ExchangeInformation;

use Binance\Collection\AbstractCollection;

final class ExchangeInformationDTOCollection extends AbstractCollection
{
    protected function getCollectionType(): string
    {
        return ExchangeInformationDTO::class;
    }
}

<?php

declare(strict_types=1);

namespace Binance\DTO\Factory;

use Binance\DTO\Collection\SymbolPriceDTOCollection;
use Binance\DTO\SymbolPriceDTO;

final class SymbolPriceDTOCollectionFactory
{
    public static function createFromArray(array $data): SymbolPriceDTO
    {
        return new SymbolPriceDTO(
            $data['symbol'],
            $data['price']
        );
    }

    public static function createCollectionFromArray(array $data): SymbolPriceDTOCollection
    {
        if (is_int(array_key_first($data))) {
            return SymbolPriceDTOCollection::fromArray(
                array_map(static fn (array $item): SymbolPriceDTO => self::createFromArray($item), $data)
            );
        }

        return SymbolPriceDTOCollection::fromArray([
            self::createFromArray($data)
        ]);
    }
}

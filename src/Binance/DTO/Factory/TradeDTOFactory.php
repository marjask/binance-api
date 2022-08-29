<?php

declare(strict_types=1);

namespace Binance\DTO\Factory;

use Binance\DTO\Collection\TradeDTOCollection;
use Binance\DTO\TradeDTO;

final class TradeDTOFactory
{
    public static function createFromArray(array $data): TradeDTO
    {
        return new TradeDTO(
            $data['id'],
            $data['price'],
            $data['qty'],
            $data['quoteQty'],
            $data['time'],
            $data['isBuyerMaker'],
            $data['isBestMatch']
        );
    }

    public static function createCollectionFromArray(array $data): TradeDTOCollection
    {
        return TradeDTOCollection::fromArray(
            array_map(static fn (array $item): TradeDTO => self::createFromArray($item), $data)
        );
    }
}

<?php

declare(strict_types=1);

namespace Binance\DTO\NewOrder\Factory;

use Binance\DTO\Collection\FillDTOCollection;
use Binance\DTO\NewOrder\FillDTO;

final class FillDTOFactory
{
    public static function createFromArray(array $data): FillDTO
    {
        return new FillDTO(
            $data['price'],
            $data['qty'],
            $data['commission'],
            $data['commissionAsset'],
            $data['tradeId'],
        );
    }

    public static function createCollectionFromArray(array $data): FillDTOCollection
    {
        return FillDTOCollection::fromArray(
            array_map(static fn (array $item): FillDTO => self::createFromArray($item), $data)
        );
    }
}

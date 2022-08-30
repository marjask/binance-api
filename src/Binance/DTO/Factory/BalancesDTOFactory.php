<?php

declare(strict_types=1);

namespace Binance\DTO\Factory;

use Binance\DTO\BalancesDTO;
use Binance\DTO\Collection\BalancesDTOCollection;

final class BalancesDTOFactory
{
    public static function createFromArray(array $data): BalancesDTO
    {
        return new BalancesDTO(
            $data['asset'],
            $data['free'],
            $data['locked']
        );
    }

    public static function createCollectionFromArray(array $data): BalancesDTOCollection
    {
        return BalancesDTOCollection::fromArray(
            array_map(static fn (array $item): BalancesDTO => self::createFromArray($item), $data)
        );
    }
}

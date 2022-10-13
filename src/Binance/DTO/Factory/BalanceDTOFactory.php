<?php

declare(strict_types=1);

namespace Binance\DTO\Factory;

use Binance\DTO\BalanceDTO;
use Binance\DTO\Collection\BalancesDTOCollection;

final class BalanceDTOFactory
{
    public static function createFromArray(array $data): BalanceDTO
    {
        return new BalanceDTO(
            $data['asset'],
            $data['free'],
            $data['locked']
        );
    }

    public static function createCollectionFromArray(array $data): BalancesDTOCollection
    {
        return BalancesDTOCollection::fromArray(
            array_map(static fn (array $item): BalanceDTO => self::createFromArray($item), $data)
        );
    }
}

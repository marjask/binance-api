<?php

declare(strict_types=1);

namespace Binance\DTO\Factory;

use Binance\DTO\Collection\CurrentOrderCountUsageDTOCollection;
use Binance\DTO\CurrentOrderCountUsageDTO;

final class CurrentOrderCountUsageDTOFactory
{
    public static function createFromArray(array $data): CurrentOrderCountUsageDTO
    {
        return new CurrentOrderCountUsageDTO(
            $data['rateLimitType'],
            $data['interval'],
            $data['intervalNum'],
            $data['limit'],
            $data['count']
        );
    }

    public static function createCollectionFromArray(array $data): CurrentOrderCountUsageDTOCollection
    {
        return CurrentOrderCountUsageDTOCollection::fromArray(
            array_map(static fn (array $item): CurrentOrderCountUsageDTO => self::createFromArray($item), $data)
        );
    }
}

<?php

namespace Binance\DTO\Factory;

use Binance\DTO\CurrentAveragePriceDTO;

final class CurrentAveragePriceDTOFactory
{
    public static function createFromArray(array $data): CurrentAveragePriceDTO
    {
        return new CurrentAveragePriceDTO(
            $data['mins'],
            $data['price']
        );
    }
}

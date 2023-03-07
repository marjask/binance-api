<?php

declare(strict_types=1);

namespace Binance\DTO\Factory;

use Binance\DTO\CandlestickDataDTO;
use Binance\DTO\Collection\CandlestickDataDTOCollection;
use Binance\ValueObject\Real;

final class CandlestickDataDTOFactory
{
    public static function createFromArray(array $data): CandlestickDataDTO
    {
        return new CandlestickDataDTO(
            $data[0],
            (new Real($data[1]))->getValue(),
            (new Real($data[2]))->getValue(),
            (new Real($data[3]))->getValue(),
            (new Real($data[4]))->getValue(),
            (new Real($data[5]))->getValue(),
            $data[6],
            (new Real($data[7]))->getValue(),
            $data[8],
            (new Real($data[9]))->getValue(),
            (new Real($data[10]))->getValue(),
        );
    }

    public static function createCollectionFromArray(array $data): CandlestickDataDTOCollection
    {
        $collection = new CandlestickDataDTOCollection();

        foreach ($data as $item) {
            $collection->add(
                self::createFromArray($item)
            );
        }

        return $collection;
    }
}

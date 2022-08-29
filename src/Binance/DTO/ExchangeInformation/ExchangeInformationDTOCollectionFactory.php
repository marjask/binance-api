<?php

declare(strict_types=1);

namespace Binance\DTO\ExchangeInformation;

use Binance\Collection\OrderTypeCollection;
use Binance\DTO\ExchangeInformation\Filter\Factory\FilterFactory;

final class ExchangeInformationDTOCollectionFactory
{
    public static function createFromArray(array $data): ExchangeInformationDTO
    {
        return new ExchangeInformationDTO(
            $data['symbol'],
            $data['status'],
            $data['baseAsset'],
            $data['baseAssetPrecision'],
            $data['quoteAsset'],
            $data['quotePrecision'],
            $data['quoteAssetPrecision'],
            $data['baseCommissionPrecision'],
            $data['quoteCommissionPrecision'],
            OrderTypeCollection::createFromStringArray($data['orderTypes']),
            $data['icebergAllowed'],
            $data['ocoAllowed'],
            $data['quoteOrderQtyMarketAllowed'],
            $data['allowTrailingStop'],
            $data['cancelReplaceAllowed'],
            $data['isSpotTradingAllowed'],
            $data['isMarginTradingAllowed'],
            FilterFactory::createFilterCollectionFromArray($data['filters'])
        );
    }

    public static function createExchangeInformationDTOCollectionFromArray(array $data): ExchangeInformationDTOCollection
    {
        return ExchangeInformationDTOCollection::fromArray(
            array_map(static fn (array $item): ExchangeInformationDTO => self::createFromArray($item), $data)
        );
    }
}

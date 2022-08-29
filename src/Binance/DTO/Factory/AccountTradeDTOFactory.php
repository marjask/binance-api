<?php

declare(strict_types=1);

namespace Binance\DTO\Factory;

use Binance\DTO\Collection\AccountTradeDTOCollection;
use Binance\DTO\AccountTradeDTO;

final class AccountTradeDTOFactory
{
    public static function createFromArray(array $data): AccountTradeDTO
    {
        return new AccountTradeDTO(
            $data['symbol'],
            $data['id'],
            $data['orderId'],
            $data['orderListId'],
            $data['price'],
            $data['qty'],
            $data['quoteQty'],
            $data['commission'],
            $data['commissionAsset'],
            $data['time'],
            $data['isBuyer'],
            $data['isMaker'],
            $data['isBestMatch']
        );
    }

    public static function createCollectionFromArray(array $data): AccountTradeDTOCollection
    {
        return AccountTradeDTOCollection::fromArray(
            array_map(static fn (array $item): AccountTradeDTO => self::createFromArray($item), $data)
        );
    }
}

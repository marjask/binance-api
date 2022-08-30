<?php

declare(strict_types=1);

namespace Binance\DTO\Factory;

use Binance\DTO\CancelOrderDTO;
use Binance\DTO\Collection\CloseOrderDTOCollection;

final class CloseOrderDTOFactory
{
    public static function createFromArray(array $data): CancelOrderDTO
    {
        return new CancelOrderDTO(
            $data['symbol'],
            $data['origClientOrderId'],
            $data['orderId'],
            $data['orderListId'],
            $data['clientOrderId'],
            $data['price'],
            $data['origQty'],
            $data['executedQty'],
            $data['cummulativeQuoteQty'],
            $data['status'],
            $data['timeInForce'],
            $data['type'],
            $data['side']
        );
    }

    public static function createCollectionFromArray(array $data): CloseOrderDTOCollection
    {
        $collection = new CloseOrderDTOCollection();

        foreach ($data as $item) {
            if (array_key_first($item) !== 'symbol') {
                // OCO not supported
                continue;
            }

            $collection->add(
                self::createFromArray($item)
            );
        }

        return $collection;
    }
}

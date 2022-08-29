<?php

declare(strict_types=1);

namespace Binance\DTO\Factory;

use Binance\DTO\Collection\OrderDTOCollection;
use Binance\DTO\OrderDTO;

final class OrderDTOFactory
{
    public static function createCollectionFromArray(array $data): OrderDTOCollection
    {
        return OrderDTOCollection::fromArray(
            array_map(static fn (array $item): OrderDTO => self::createFromArray($item), $data)
        );
    }

    public static function createFromArray(array $data): OrderDTO
    {
        return new OrderDTO(
            $data['symbol'],
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
            $data['side'],
            $data['stopPrice'],
            $data['icebergQty'],
            $data['time'],
            $data['updateTime'],
            $data['isWorking'],
            $data['origQuoteOrderQty']
        );
    }
}

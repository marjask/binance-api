<?php

declare(strict_types=1);

namespace Binance\DTO\NewOrder\Factory;

use Binance\DTO\NewOrder\NewOrderResultDTO;

final class NewOrderResultDTOFactory extends AbstractNewOrderDTOFactory
{
    public function createFromArray(array $data): NewOrderResultDTO
    {
        return new NewOrderResultDTO(
            $data['symbol'],
            $data['orderId'],
            $data['orderListId'],
            $data['clientOrderId'],
            $data['transactTime'],
            $data['price'],
            $data['origQty'],
            $data['executedQty'],
            $data['cummulativeQuoteQty'],
            $data['status'],
            $data['timeInForce'],
            $data['type'],
            $data['side'],
            $data['strategyId'] ?? null,
            $data['strategyType'] ?? null
        );
    }
}

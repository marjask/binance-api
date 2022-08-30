<?php

declare(strict_types=1);

namespace Binance\DTO\NewOrder\Factory;

use Binance\DTO\NewOrder\NewOrderFullDTO;

final class NewOrderFullDTOFactory extends AbstractNewOrderDTOFactory
{
    public function createFromArray(array $data): NewOrderFullDTO
    {
        return new NewOrderFullDTO(
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
            FillDTOFactory::createCollectionFromArray($data['fills']),
        );
    }
}

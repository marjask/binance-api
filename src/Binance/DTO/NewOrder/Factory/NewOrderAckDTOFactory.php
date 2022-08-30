<?php

declare(strict_types=1);

namespace Binance\DTO\NewOrder\Factory;

use Binance\DTO\NewOrder\NewOrderAckDTO;

final class NewOrderAckDTOFactory extends AbstractNewOrderDTOFactory
{
    public function createFromArray(array $data): NewOrderAckDTO
    {
        return new NewOrderAckDTO(
            $data['symbol'],
            $data['orderId'],
            $data['orderListId'],
            $data['clientOrderId'],
            $data['transactTime']
        );
    }
}

<?php

declare(strict_types=1);

namespace Binance\DTO\NewOrder\Factory;

use Binance\Command\NewOrderCommand;
use Binance\ValueObject\OrderRespType;
use Binance\ValueObject\OrderType;

final class NewOrderFactory
{
    public static function getFactoryByNewOrderCommand(NewOrderCommand $cmd): AbstractNewOrderDTOFactory
    {
        $orderResponseType = $cmd->getNewOrderRespType();

        if ($orderResponseType instanceof OrderRespType) {
            return match ($orderResponseType->getValue()) {
                OrderRespType::ORDER_RESP_TYPE_RESULT => new NewOrderResultDTOFactory(),
                OrderRespType::ORDER_RESP_TYPE_FULL => new NewOrderFullDTOFactory(),
                default => new NewOrderAckDTOFactory(),
            };
        }

        $type = $cmd->getType();

        if ($type instanceof OrderType && in_array($type->getValue(), [
            OrderType::ORDER_TYPE_LIMIT,
            OrderType::ORDER_TYPE_MARKET,
        ], true)) {
            return new NewOrderFullDTOFactory();
        }

        return new NewOrderAckDTOFactory();
    }
}

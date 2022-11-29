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

        if ($cmd->getTest()->toBoolean() === true) {
            return new NewOrderTestDTOFactory();
        }

        if ($orderResponseType instanceof OrderRespType) {
            return match ($orderResponseType->getValue()) {
                OrderRespType::RESULT => new NewOrderResultDTOFactory(),
                OrderRespType::FULL => new NewOrderFullDTOFactory(),
                default => new NewOrderAckDTOFactory(),
            };
        }

        $type = $cmd->getType();

        if ($type instanceof OrderType && in_array($type->getValue(), [
            OrderType::LIMIT,
            OrderType::MARKET,
        ], true)) {
            return new NewOrderFullDTOFactory();
        }

        return new NewOrderAckDTOFactory();
    }
}

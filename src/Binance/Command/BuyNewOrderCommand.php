<?php

declare(strict_types=1);

namespace Binance\Command;

use Binance\ValueObject\OrderSide;
use Binance\ValueObject\OrderType;

final class BuyNewOrderCommand extends NewOrderCommand
{
    public function __construct()
    {
        parent::__construct();

        $this->setSide(new OrderSide(OrderSide::ORDER_SIDE_BUY));
        $this->setType(new OrderType(OrderType::ORDER_TYPE_MARKET));
    }
}

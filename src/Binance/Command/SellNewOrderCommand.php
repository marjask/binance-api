<?php

declare(strict_types=1);

namespace Binance\Command;

use Binance\ApiConst;
use Binance\ValueObject\OrderSide;
use Binance\ValueObject\OrderType;

final class SellNewOrderCommand extends NewOrderCommand
{
    public function __construct()
    {
        parent::__construct();

        $this->setSide(new OrderSide(OrderSide::SELL));
        $this->setType(new OrderType(OrderType::MARKET));
    }
}

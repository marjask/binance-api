<?php

declare(strict_types=1);

namespace Binance\Command;

use Binance\ApiConst;
use Binance\ValueObject\OrderSide;
use Binance\ValueObject\OrderType;

final class BuyOpenOrderCommand extends OpenOrderCommand
{
    public function __construct()
    {
        parent::__construct();

        $this->setSide(new OrderSide(ApiConst::ORDER_SIDE_BUY));
        $this->setType(new OrderType(ApiConst::ORDER_TYPE_MARKET));
    }
}

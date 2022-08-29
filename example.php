<?php

use Binance\Api;
use Binance\ApiConfig;
use Binance\ApiConst;
use Binance\Command\BuyNewOrderCommand;
use Binance\Command\SellNewOrderCommand;
use Binance\ValueObject\OrderType;
use Binance\ValueObject\Text;

$api = new Api(
    (new ApiConfig())
        ->setApiKey('test')
        ->setApiSecret('test')
        ->setDebug(false)
        ->setTestnetEnable(true)
);

$api->newOrder(
    (new BuyNewOrderCommand())
        ->setSymbol(new Text('SHIBUSDT'))
        ->setType(new OrderType(OrderType::ORDER_TYPE_MARKET))
);

$api->newOrder(
    (new SellNewOrderCommand())
        ->setSymbol(new Text('SHIBUSDT'))
        ->setType(new OrderType(OrderType::ORDER_TYPE_MARKET))
);

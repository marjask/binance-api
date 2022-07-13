<?php

use Binance\Api;
use Binance\ApiConfig;
use Binance\ApiConst;
use Binance\Command\BuyOpenOrderCommand;
use Binance\Command\SellOpenOrderCommand;
use Binance\ValueObject\OrderType;
use Binance\ValueObject\Text;

$api = new Api(
    (new ApiConfig())
        ->setApiKey('test')
        ->setApiSecret('test')
        ->setDebug(false)
        ->setTestnetEnable(true)
);

$api->createOrder(
    (new BuyOpenOrderCommand())
        ->setSymbol(new Text('SHIBUSDT'))
        ->setType(new OrderType(ApiConst::ORDER_TYPE_MARKET))
);

$api->createOrder(
    (new SellOpenOrderCommand())
        ->setSymbol(new Text('SHIBUSDT'))
        ->setType(new OrderType(ApiConst::ORDER_TYPE_MARKET))
);

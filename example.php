<?php

use Binance\Api;
use Binance\ApiConfig;
use Binance\Command\CancelOrderCommand;
use Binance\Command\CloseAllOpenOrdersCommand;
use Binance\Command\NewOrderCommand;
use Binance\Query\AccountInformationQuery;
use Binance\Query\AccountTradeListQuery;
use Binance\Query\AllOrdersQuery;
use Binance\Query\CurrentOpenOrdersQuery;
use Binance\Query\ExchangeInformationQuery;
use Binance\Query\OldTradeLookupQuery;
use Binance\Query\OrderQuery;
use Binance\Query\RecentTradesListQuery;
use Binance\ValueObject\BinanceApiAccountKey;
use Binance\ValueObject\Id;
use Binance\ValueObject\Integer;
use Binance\ValueObject\OrderRespType;
use Binance\ValueObject\OrderSide;
use Binance\ValueObject\OrderType;
use Binance\ValueObject\Price;
use Binance\ValueObject\Real;
use Binance\ValueObject\RecvWindow;
use Binance\ValueObject\Symbol;
use Binance\ValueObject\TimeInForce;
use Binance\ValueObject\Timestamp;
use CurlClient\Exception\ResponseErrorException;
use CurlClient\RequestLogger\Logger;
use CurlClient\RequestLogger\Source\FileSource;
use Marjask\ObjectValidator\Exception\InvalidValidationException;

// default request don't saved
$api = new Api(
    (new ApiConfig())
        ->setDebug(false)
        ->setTestnetEnable(true)
);

// if you are going to save the request set logger, ex:
// save request log to file, REMEMBER: logger save only one request
$api->setLogger(
    new Logger(
        new FileSource('requestLogger.log')
    )
);

// won't save request log
$api->resetLogger();

// set api key and secret key if endpoint use HMAC SHA256 signature.
$api->setBinanceApiAccountKey(
    new BinanceApiAccountKey(
        'api_key',
        'secret_key'
    )
);

try {
    $bool = $api->ping();

    $integer = $api->getCheckServerTime();

    $exchangeInformationDTOCollection = $api->getExchangeInformation(
        (new ExchangeInformationQuery())
            ->setSymbol(Symbol::fromString('ETHUSDT'))
    );

    $lastRequestLogCommand = $api->getLastRequestLogCommand();

    $accountInformationDTO = $api->getAccountInformation(
        (new AccountInformationQuery())
    );

    $orderDTOCollection = $api->getAllOrders(
        (new AllOrdersQuery())
            ->setSymbol(new Symbol('ETHUSDT'))
            ->setStartTime(
                Timestamp::fromString('-1month')
            )
    );

    $tradeDTOCollection = $api->getRecentTradesList(
        (new RecentTradesListQuery())
            ->setSymbol(Symbol::fromString('ETHUSDT'))
            ->setLimit(new Integer(10))
    );

    $orderDTOCollection = $api->getCurrentOpenOrders(
        (new CurrentOpenOrdersQuery())
            ->setSymbol(new Symbol('ETHUSDT'))
    );

    $closeOrderDTOCollection = $api->closeAllOpenOrdersOnSymbol(
        (new CloseAllOpenOrdersCommand())
            ->setSymbol(Symbol::fromString('ETHUSDT'))
    );

    $newOrderFullDTO = $api->newOrder(
        (new NewOrderCommand())
            ->setSide(new OrderSide(OrderSide::BUY))
            ->setType(new OrderType(OrderType::LIMIT))
            ->setQuantity(new Real(0.1))
            ->setSymbol(new Symbol('ETHUSDT'))
            ->setPrice(new Price('500'))
            ->setTimeInForce(new TimeInForce(TimeInForce::GTC))
            ->setNewOrderRespType(new OrderRespType(OrderRespType::RESULT))
    );

    $orderDTOCollection = $api->getCurrentOpenOrders(
        (new CurrentOpenOrdersQuery())
            ->setSymbol(new Symbol('ETHUSDT'))
            ->setRecvWindow(new RecvWindow(60000))
    );

    $orderDTO = $api->getOrder(
        (new OrderQuery())
            ->setSymbol(new Symbol('ETHUSDT'))
            ->setOrderId(new Id($newOrderFullDTO->getOrderId()))
    );

    $accountTradeDTOCollection = $api->getAccountTradeList(
        (new AccountTradeListQuery())
            ->setSymbol(Symbol::fromString('ETHUSDT'))
    );

    $cancelOrderDTO = $api->cancelOrder(
        (new CancelOrderCommand())
            ->setSymbol(new Symbol('ETHUSDT'))
            ->setOrderId(new Id($newOrderFullDTO->getOrderId()))
    );

    $tradeDTOCollection = $api->getOldTradeLookup(
        (new OldTradeLookupQuery())
            ->setSymbol(Symbol::fromString('ETHUSDT'))
            ->setLimit(new Integer(50))
    );
} catch (ResponseErrorException $errorResponseException) {
    // if binance return error you can check error code, message and basic header
    var_dump($errorResponseException->getErrorResponse()->getErrorCode());
    var_dump($errorResponseException->getErrorResponse()->getMsg());
    var_dump($errorResponseException->getErrorResponse()->getHeaders());
} catch (InvalidValidationException $e) {
    // if validation fail
} catch (Throwable $e) {
    // other exceptions
}

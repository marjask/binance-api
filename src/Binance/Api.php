<?php

declare(strict_types=1);

namespace Binance;

use Binance\Command\CloseAllOpenOrdersCommand;
use Binance\Command\CancelOrderCommand;
use Binance\DTO\AccountInformationDTO;
use Binance\DTO\CancelOrderDTO;
use Binance\DTO\Collection\CloseOrderDTOCollection;
use Binance\DTO\Collection\CurrentOrderCountUsageDTOCollection;
use Binance\DTO\Collection\AccountTradeDTOCollection;
use Binance\DTO\Collection\OrderDTOCollection;
use Binance\DTO\Collection\SymbolPriceDTOCollection;
use Binance\DTO\Collection\TradeDTOCollection;
use Binance\DTO\CurrentAveragePriceDTO;
use Binance\DTO\ExchangeInformation\ExchangeInformationDTOCollection;
use Binance\DTO\ExchangeInformation\ExchangeInformationDTOCollectionFactory;
use Binance\DTO\Factory\AccountInformationDTOFactory;
use Binance\DTO\Factory\CloseOrderDTOFactory;
use Binance\DTO\Factory\CurrentAveragePriceDTOFactory;
use Binance\DTO\Factory\CurrentOrderCountUsageDTOFactory;
use Binance\DTO\Factory\AccountTradeDTOFactory;
use Binance\DTO\Factory\OrderDTOFactory;
use Binance\DTO\Factory\SymbolPriceDTOCollectionFactory;
use Binance\DTO\Factory\TradeDTOFactory;
use Binance\DTO\NewOrder\AbstractNewOrder;
use Binance\DTO\NewOrder\Factory\NewOrderFactory;
use Binance\DTO\OrderDTO;
use Binance\Query\AccountInformationQuery;
use Binance\Query\AccountTradeListQuery;
use Binance\Query\AllOrdersQuery;
use Binance\Query\CurrentAveragePriceQuery;
use Binance\Query\SymbolPriceTickerQuery;
use Binance\Query\CurrentOpenOrdersQuery;
use Binance\Query\CurrentOrderCountUsageQuery;
use Binance\Query\ExchangeInformationQuery;
use Binance\Query\OldTradeLookupQuery;
use Binance\Query\OrderQuery;
use Binance\Query\RecentTradesListQuery;
use Binance\Validator\AccountInformationQueryValidator;
use Binance\Validator\AccountTradeListQueryValidator;
use Binance\Validator\AllOrdersQueryValidator;
use Binance\Validator\CloseAllOpenOrdersCommandValidator;
use Binance\Validator\CancelOrderCommandValidator;
use Binance\Validator\CurrentAveragePriceQueryValidator;
use Binance\Validator\CurrentOpenOrdersQueryValidator;
use Binance\Validator\CurrentOrderCountUsageQueryValidator;
use Binance\Validator\ExchangeInformationQueryValidator;
use Binance\Validator\OldTradeLookupQueryValidator;
use Binance\Validator\NewOrderCommandValidator;
use Binance\Validator\OrderQueryValidator;
use Binance\Validator\RecentTradesListQueryValidator;
use Binance\Validator\SymbolPriceTickerQueryValidator;
use Binance\ValueObject\BinanceApiAccountKey;
use Binance\ValueObject\Integer as IntegerVO;
use CurlClient\CurlClient;
use Binance\Command\NewOrderCommand;
use CurlClient\CurlClientConst;
use CurlClient\Exception\ResponseErrorException;
use CurlClient\Query\Request;
use CurlClient\Request\RequestDetails;

class Api
{
    private CurlClient $client;

    public function __construct(ApiConfig $config)
    {
        $this->client = new CurlClient(
            $config->toArray()
        );
    }

    public function getLastRequestDetails(): ?RequestDetails
    {
        return $this->client->getLastRequestDetails();
    }

    public function setBinanceApiAccountKey(BinanceApiAccountKey $binanceApiAccountKey): self
    {
        $this->client->setBinanceApiAccountKey($binanceApiAccountKey);

        return $this;
    }

    public function newOrder(NewOrderCommand $cmd): AbstractNewOrder
    {
        NewOrderCommandValidator::create()->throwIfInvalid($cmd);

        try {
            $response = $this->client->request(
                (new Request())
                    ->setMethod(CurlClientConst::POST)
                    ->setPath(
                        ApiRouter::getOrderUrl($cmd->getTest()->toBoolean())
                    )
                    ->setParams(
                        $cmd->toArray()
                    )
            );
        } catch (ResponseErrorException $exception) {
            if ($cmd->getTest()->toBoolean() === true) {
                return NewOrderFactory::getFactoryByNewOrderCommand($cmd)
                    ->createFromArray(
                        $exception->getErrorResponse()->getData()
                    );
            }

            throw $exception;
        }

        return NewOrderFactory::getFactoryByNewOrderCommand($cmd)
            ->createFromArray($response->getData());
    }

    public function getOrder(OrderQuery $cmd): OrderDTO
    {
        OrderQueryValidator::create()->throwIfInvalid($cmd);

        $response = $this->client->request(
            (new Request())
                ->setMethod(CurlClientConst::GET)
                ->setPath(
                    ApiRouter::getOrderUrl()
                )
                ->setParams(
                    $cmd->toArray()
                )
        );

        return OrderDTOFactory::createFromArray($response->getData());
    }

    public function cancelOrder(CancelOrderCommand $cmd): CancelOrderDTO
    {
        CancelOrderCommandValidator::create()->throwIfInvalid($cmd);

        $response = $this->client->request(
            (new Request())
                ->setMethod(CurlClientConst::DELETE)
                ->setPath(ApiRouter::getOrderUrl())
                ->setParams(
                    $cmd->toArray()
                )
        );

        return CloseOrderDTOFactory::createFromArray($response->getData());
    }

    public function closeAllOpenOrdersOnSymbol(CloseAllOpenOrdersCommand $cmd): CloseOrderDTOCollection
    {
        CloseAllOpenOrdersCommandValidator::create()->throwIfInvalid($cmd);

        $response = $this->client->request(
            (new Request())
                ->setMethod(CurlClientConst::DELETE)
                ->setPath(ApiRouter::getCurrentOpenOrdersUrl())
                ->setParams(
                    $cmd->toArray()
                )
        );

        return CloseOrderDTOFactory::createCollectionFromArray($response->getData());
    }

    public function getCurrentOpenOrders(CurrentOpenOrdersQuery $query): OrderDTOCollection
    {
        CurrentOpenOrdersQueryValidator::create()->throwIfInvalid($query);

        $response = $this->client->request(
            (new Request())
                ->setMethod(CurlClientConst::GET)
                ->setPath(ApiRouter::getCurrentOpenOrdersUrl())
                ->setParams(
                    $query->toArray()
                )
        );

        return OrderDTOFactory::createCollectionFromArray($response->getData());
    }

    public function getAllOrders(AllOrdersQuery $query): OrderDTOCollection
    {
        AllOrdersQueryValidator::create()->throwIfInvalid($query);

        $response = $this->client->request(
            (new Request())
                ->setMethod(CurlClientConst::GET)
                ->setPath(ApiRouter::getAllOrdersUrl())
                ->setParams(
                    $query->toArray()
                )
        );

        return OrderDTOFactory::createCollectionFromArray($response->getData());
    }

    public function getAccountInformation(AccountInformationQuery $query): AccountInformationDTO
    {
        AccountInformationQueryValidator::create()->throwIfInvalid($query);

        $response = $this->client->request(
            (new Request())
                ->setMethod(CurlClientConst::GET)
                ->setPath(ApiRouter::getAccountInformationUrl())
                ->setParams(
                    $query->toArray()
                )
        );

        return AccountInformationDTOFactory::createFromArray($response->getData());
    }

    public function getCheckServerTime(): IntegerVO
    {
        $response = $this->client->request(
            (new Request())
                ->setMethod(CurlClientConst::GET)
                ->setPath(ApiRouter::getCheckServerTimeUrl())
                ->setParams([])
                ->setSignature(false)
        );

        return new IntegerVO($response->getData()['serverTime']);
    }

    public function ping(): bool
    {
        try {
            $response = $this->client->request(
                (new Request())
                    ->setMethod(CurlClientConst::GET)
                    ->setPath(ApiRouter::getTestConnectivityUrl())
                    ->setParams([])
                    ->setSignature(false)
            );
        } catch (ResponseErrorException $e) {
            return false;
        }

        return is_array($response->getData());
    }

    public function getExchangeInformation(ExchangeInformationQuery $query): ExchangeInformationDTOCollection
    {
        ExchangeInformationQueryValidator::create()->throwIfInvalid($query);

        $response = $this->client->request(
            (new Request())
                ->setMethod(CurlClientConst::GET)
                ->setPath(ApiRouter::getExchangeInformationUrl())
                ->setParams(
                    $query->toArray()
                )
                ->setSignature(false)
        );

        return ExchangeInformationDTOCollectionFactory::createExchangeInformationDTOCollectionFromArray(
            $response->getData()['symbols']
        );
    }

    public function getRecentTradesList(RecentTradesListQuery $query): TradeDTOCollection
    {
        RecentTradesListQueryValidator::create()->throwIfInvalid($query);

        $response = $this->client->request(
            (new Request())
                ->setMethod(CurlClientConst::GET)
                ->setPath(ApiRouter::getRecentTradesListUrl())
                ->setParams(
                    $query->toArray()
                )
                ->setSignature(false)
        );

        return TradeDTOFactory::createCollectionFromArray($response->getData());
    }

    public function getOldTradeLookup(OldTradeLookupQuery $query): TradeDTOCollection
    {
        OldTradeLookupQueryValidator::create()->throwIfInvalid($query);

        $response = $this->client->request(
            (new Request())
                ->setMethod(CurlClientConst::GET)
                ->setPath(ApiRouter::getOldTradeLookupUrl())
                ->setParams(
                    $query->toArray()
                )
                ->setSignature(false)
        );

        return TradeDTOFactory::createCollectionFromArray($response->getData());
    }

    public function getAccountTradeList(AccountTradeListQuery $query): AccountTradeDTOCollection
    {
        AccountTradeListQueryValidator::create()->throwIfInvalid($query);

        $response = $this->client->request(
            (new Request())
                ->setMethod(CurlClientConst::GET)
                ->setPath(ApiRouter::getAccountTradeListUrl())
                ->setParams(
                    $query->toArray()
                )
        );

        return AccountTradeDTOFactory::createCollectionFromArray($response->getData());
    }

    public function getCurrentOrderCountUsage(CurrentOrderCountUsageQuery $query): CurrentOrderCountUsageDTOCollection
    {
        CurrentOrderCountUsageQueryValidator::create()->throwIfInvalid($query);

        $response = $this->client->request(
            (new Request())
                ->setMethod(CurlClientConst::GET)
                ->setPath(ApiRouter::getCurrentOrderCountUsageUrl())
                ->setParams(
                    $query->toArray()
                )
        );

        return CurrentOrderCountUsageDTOFactory::createCollectionFromArray($response->getData());
    }

    public function getSymbolPriceTicker(SymbolPriceTickerQuery $query): SymbolPriceDTOCollection
    {
        SymbolPriceTickerQueryValidator::create()->throwIfInvalid($query);

        $response = $this->client->request(
            (new Request())
                ->setMethod(CurlClientConst::GET)
                ->setPath(ApiRouter::getSymbolPriceTickerUrl())
                ->setParams(
                    $query->toArray()
                )
                ->setSignature(false)
        );

        return SymbolPriceDTOCollectionFactory::createCollectionFromArray($response->getData());
    }

    public function getCurrentAveragePrice(CurrentAveragePriceQuery $query): CurrentAveragePriceDTO
    {
        CurrentAveragePriceQueryValidator::create()->throwIfInvalid($query);

        $response = $this->client->request(
            (new Request())
                ->setMethod(CurlClientConst::GET)
                ->setPath(ApiRouter::getCurrentAveragePriceUrl())
                ->setParams(
                    $query->toArray()
                )
                ->setSignature(false)
        );

        return CurrentAveragePriceDTOFactory::createFromArray($response->getData());
    }
}

<?php

declare(strict_types=1);

namespace Binance;

use Binance\Command\CloseAllOpenOrdersCommand;
use Binance\Command\CloseOrderCommand;
use CurlClient\CurlClient;
use Binance\Command\OpenOrderCommand;
use CurlClient\CurlClientConst;
use CurlClient\Query\Request;
use CurlClient\Response\CloseOrderResponse;
use CurlClient\Response\CreateOrderResponse;

class Api
{
    private CurlClient $client;
    private ApiConfig $config;

    public function __construct(ApiConfig $config)
    {
        $this->client = new CurlClient(
            $config->toArray()
        );
        $this->config = $config;
    }

    public function createOrder(OpenOrderCommand $cmd): CreateOrderResponse
    {
//        dump('ok');
        dd($cmd->validate());
        exit;

        [$headers, $output] = $this->client->request(
            (new Request())
                ->setMethod(CurlClientConst::POST)
                ->setPath(
                    ApiRouter::getOrderUrl($cmd->isTest()->toBoolean())
                )
                ->setParams(
                    $cmd->getPreparedParams()
                )
        );

        return new CreateOrderResponse($headers, $output);
    }

    public function closeOrder(CloseOrderCommand $cmd): CloseOrderResponse
    {
        $cmd->throwIfInvalid();

        [$headers, $output] = $this->client->request(
            (new Request())
                ->setMethod(CurlClientConst::DELETE)
                ->setPath(ApiRouter::getOrderUrl())
                ->setParams(
                    $cmd->getPreparedParams()
                )
        );

        return new CloseOrderResponse($headers, $output);
    }

    public function closeAllOpenOrdersOnSymbol(CloseAllOpenOrdersCommand $cmd): CloseOrderResponse
    {
        $cmd->throwIfInvalid();

        [$headers, $output] = $this->client->request(
            (new Request())
                ->setMethod(CurlClientConst::DELETE)
                ->setPath(ApiRouter::getCancelAllOpenOrdersOnSymbolUrl())
                ->setParams(
                    $cmd->getPreparedParams()
                )
        );

        return new CloseOrderResponse($headers, $output);
    }
}

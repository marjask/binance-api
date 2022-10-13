<?php

declare(strict_types=1);

namespace Test\Binance\DTO\NewOrder\ProviderData;

use Binance\DTO\Collection\FillDTOCollection;
use Binance\DTO\NewOrder\FillDTO;
use Generator;

final class NewOrderFullDTOProviderData
{
    public static function data(): Generator
    {
        yield [
            'symbol' => 'ETHUSDT',
            'orderId' => 123123123,
            'orderListId' => 123123123,
            'clientOrderId' => '1230qud091a',
            'transactTime' => 12312312312313,
            'price' => '123.123',
            'origQty' => '12.112',
            'executedQty' => '12.123',
            'cummulativeQuoteQty' => '12.1',
            'status' => 'NEW',
            'timeInForce' => 'GTC',
            'type' => 'LIMIT',
            'side' => 'BUY',
            'fills' => FillDTOCollection::fromArray([
                new FillDTO(
                '123.123',
                '123.1',
                '0.001',
                '0.0012',
                123123
                ),
                new FillDTO(
                    '1213.123',
                    '123.2',
                    '0.01',
                    '0.0022',
                    1231123
                ),
            ]),
            'expectedFills' => [
                [
                    'price' => '123.123',
                    'qty' => '123.1',
                    'commission' => '0.001',
                    'commissionAsset' => '0.0012',
                    'tradeId' => 123123,
                ],
                [
                    'price' => '1213.123',
                    'qty' => '123.2',
                    'commission' => '0.01',
                    'commissionAsset' => '0.0022',
                    'tradeId' => 1231123,
                ]
            ],
        ];
    }
}

<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ProviderData;

use Binance\DTO\BalanceDTO;
use Binance\DTO\Collection\BalancesDTOCollection;
use Generator;

final class AccountInformationDTOProviderData
{
    public static function data(): Generator
    {
        yield [
            'makerCommission' => 0.0,
            'takerCommission' => 0.0,
            'buyerCommission' => 0.0,
            'sellerCommission' => 0.0,
            'canTrade' => true,
            'canWithdraw' => false,
            'canDeposit' => false,
            'brokered' => false,
            'updateTime' => 123123123123,
            'accountType' => 'SPOT',
            'balances' => BalancesDTOCollection::fromArray([
                new BalanceDTO('BNB', '1000.0000', '0.0000000'),
                new BalanceDTO('ETH', '10.0000', '0.0200000'),
                new BalanceDTO('USDT', '100000.0000', '10.0030000'),
            ]),
            'permissions' => ['SPOT'],
            'expectedBalancesArray' => [
                [
                    'asset' => 'BNB',
                    'free' => '1000.0000',
                    'locked' => '0.0000000',
                ],
                [
                    'asset' => 'ETH',
                    'free' => '10.0000',
                    'locked' => '0.0200000',
                ],
                [
                    'asset' => 'USDT',
                    'free' => '100000.0000',
                    'locked' => '10.0030000',
                ],
            ],
        ];
    }
}

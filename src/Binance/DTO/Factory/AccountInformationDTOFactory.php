<?php

declare(strict_types=1);

namespace Binance\DTO\Factory;

use Binance\DTO\AccountInformationDTO;

final class AccountInformationDTOFactory
{
    public static function createFromArray(array $data): AccountInformationDTO
    {
        return new AccountInformationDTO(
            $data['makerCommission'],
            $data['takerCommission'],
            $data['buyerCommission'],
            $data['sellerCommission'],
            $data['canTrade'],
            $data['canWithdraw'],
            $data['canDeposit'],
            $data['brokered'],
            $data['updateTime'],
            $data['accountType'],
            BalancesDTOFactory::createCollectionFromArray($data['balances']),
            $data['permissions'],
        );
    }
}

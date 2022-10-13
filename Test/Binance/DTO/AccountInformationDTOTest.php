<?php

declare(strict_types=1);

namespace Test\Binance\DTO;

use Binance\DTO\AccountInformationDTO;
use Binance\DTO\Collection\BalancesDTOCollection;
use PHPUnit\Framework\TestCase;

final class AccountInformationDTOTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\ProviderData\AccountInformationDTOProviderData::data()
     */
    public function testDTO(
        float $makerCommission,
        float $takerCommission,
        float $buyerCommission,
        float $sellerCommission,
        bool $canTrade,
        bool $canWithdraw,
        bool $canDeposit,
        bool $brokered,
        int $updateTime,
        string $accountType,
        BalancesDTOCollection $balances,
        array $permissions,
        array $expectedBalancesArray,
    ): void {
        $dto = new AccountInformationDTO(
            $makerCommission,
            $takerCommission,
            $buyerCommission,
            $sellerCommission,
            $canTrade,
            $canWithdraw,
            $canDeposit,
            $brokered,
            $updateTime,
            $accountType,
            $balances,
            $permissions
        );

        $this->assertInstanceOf(AccountInformationDTO::class, $dto);
        $this->assertSame($makerCommission, $dto->getMakerCommission());
        $this->assertSame($takerCommission, $dto->getTakerCommission());
        $this->assertSame($buyerCommission, $dto->getBuyerCommission());
        $this->assertSame($sellerCommission, $dto->getSellerCommission());
        $this->assertSame($canTrade, $dto->isCanTrade());
        $this->assertSame($canDeposit, $dto->isCanDeposit());
        $this->assertSame($updateTime, $dto->getUpdateTime());
        $this->assertSame($accountType, $dto->getAccountType());
        $this->assertSame($balances, $dto->getBalances());
        $this->assertInstanceOf(BalancesDTOCollection::class, $dto->getBalances());
        $this->assertIsArray($dto->getPermissions());
        $this->assertSame($permissions, $dto->getPermissions());
        $this->assertSame([
            'makerCommission' => $makerCommission,
            'takerCommission' => $takerCommission,
            'buyerCommission' => $buyerCommission,
            'sellerCommission' => $sellerCommission,
            'canTrade' => $canTrade,
            'canWithdraw' => $canWithdraw,
            'canDeposit' => $canDeposit,
            'brokered' => $brokered,
            'updateTime' => $updateTime,
            'accountType' => $accountType,
            'balances' => $expectedBalancesArray,
            'permissions' => $permissions,
        ], $dto->toArray());
    }
}

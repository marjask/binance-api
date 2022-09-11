<?php

declare(strict_types=1);

namespace Binance\DTO;

use Binance\DTO\Collection\BalancesDTOCollection;
use Trait\ToArray\ToArrayTrait;

final class AccountInformationDTO
{
    use ToArrayTrait;

    public function __construct(
        private readonly float $makerCommission,
        private readonly float $takerCommission,
        private readonly float $buyerCommission,
        private readonly float $sellerCommission,
        private readonly bool $canTrade,
        private readonly bool $canWithdraw,
        private readonly bool $canDeposit,
        private readonly bool $brokered,
        private readonly int $updateTime,
        private readonly string $accountType,
        private readonly BalancesDTOCollection $balances,
        private readonly array $permissions
    ) {
    }

    public function getMakerCommission(): float
    {
        return $this->makerCommission;
    }

    public function getTakerCommission(): float
    {
        return $this->takerCommission;
    }

    public function getBuyerCommission(): float
    {
        return $this->buyerCommission;
    }

    public function getSellerCommission(): float
    {
        return $this->sellerCommission;
    }

    public function isCanTrade(): bool
    {
        return $this->canTrade;
    }

    public function isCanWithdraw(): bool
    {
        return $this->canWithdraw;
    }

    public function isCanDeposit(): bool
    {
        return $this->canDeposit;
    }

    public function isBrokered(): bool
    {
        return $this->brokered;
    }

    public function getUpdateTime(): int
    {
        return $this->updateTime;
    }

    public function getAccountType(): string
    {
        return $this->accountType;
    }

    public function getBalances(): BalancesDTOCollection
    {
        return $this->balances;
    }

    public function getPermissions(): array
    {
        return $this->permissions;
    }
}

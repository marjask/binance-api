<?php

declare(strict_types=1);

namespace Binance\DTO\ExchangeInformation;

use Binance\Collection\OrderTypeCollection;
use Binance\DTO\ExchangeInformation\Filter\FilterCollection;
use Trait\ToArray\ToArrayTrait;

final class ExchangeInformationDTO
{
    use ToArrayTrait;

    public function __construct(
        private readonly string $symbol,
        private readonly string $status,
        private readonly string $baseAsset,
        private readonly int $baseAssetPrecision,
        private readonly string $quoteAsset,
        private readonly int $quotePrecision,
        private readonly int $quoteAssetPrecision,
        private readonly int $baseCommissionPrecision,
        private readonly int $quoteCommissionPrecision,
        private readonly OrderTypeCollection $orderTypes,
        private readonly bool $icebergAllowed,
        private readonly bool $ocoAllowed,
        private readonly bool $quoteOrderQtyMarketAllowed,
        private readonly bool $allowTrailingStop,
        private readonly bool $cancelReplaceAllowed,
        private readonly bool $isSpotTradingAllowed,
        private readonly bool $isMarginTradingAllowed,
        private readonly FilterCollection $filters,
    ) {
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getBaseAsset(): string
    {
        return $this->baseAsset;
    }

    public function getBaseAssetPrecision(): int
    {
        return $this->baseAssetPrecision;
    }

    public function getQuoteAsset(): string
    {
        return $this->quoteAsset;
    }

    public function getQuotePrecision(): int
    {
        return $this->quotePrecision;
    }

    public function getQuoteAssetPrecision(): int
    {
        return $this->quoteAssetPrecision;
    }

    public function getBaseCommissionPrecision(): int
    {
        return $this->baseCommissionPrecision;
    }

    public function getQuoteCommissionPrecision(): int
    {
        return $this->quoteCommissionPrecision;
    }

    public function getOrderTypes(): OrderTypeCollection
    {
        return $this->orderTypes;
    }

    public function isIcebergAllowed(): bool
    {
        return $this->icebergAllowed;
    }

    public function isOcoAllowed(): bool
    {
        return $this->ocoAllowed;
    }

    public function isQuoteOrderQtyMarketAllowed(): bool
    {
        return $this->quoteOrderQtyMarketAllowed;
    }

    public function isAllowTrailingStop(): bool
    {
        return $this->allowTrailingStop;
    }

    public function isCancelReplaceAllowed(): bool
    {
        return $this->cancelReplaceAllowed;
    }

    public function isSpotTradingAllowed(): bool
    {
        return $this->isSpotTradingAllowed;
    }

    public function isMarginTradingAllowed(): bool
    {
        return $this->isMarginTradingAllowed;
    }

    public function getFilters(): FilterCollection
    {
        return $this->filters;
    }
}

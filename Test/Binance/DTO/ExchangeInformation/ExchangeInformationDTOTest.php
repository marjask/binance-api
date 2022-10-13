<?php

declare(strict_types=1);

namespace Test\Binance\DTO;

use Binance\Collection\OrderTypeCollection;
use Binance\DTO\ExchangeInformation\ExchangeInformationDTO;
use Binance\DTO\ExchangeInformation\Filter\FilterCollection;
use PHPUnit\Framework\TestCase;

final class ExchangeInformationDTOTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\ProviderData\ExhangeInformationDTOProviderData::data
     */
    public function testDTO(
        string $symbol,
        string $status,
        string $baseAsset,
        int $baseAssetPrecision,
        string $quoteAsset,
        int $quotePrecision,
        int $quoteAssetPrecision,
        int $baseCommissionPrecision,
        int $quoteCommissionPrecision,
        OrderTypeCollection $orderTypes,
        bool $icebergAllowed,
        bool $ocoAllowed,
        bool $quoteOrderQtyMarketAllowed,
        bool $allowTrailingStop,
        bool $cancelReplaceAllowed,
        bool $isSpotTradingAllowed,
        bool $isMarginTradingAllowed,
        FilterCollection $filters,
        array $expectedOrderTypes,
        array $expectedFilters
    ): void {
        $dto = new ExchangeInformationDTO(
            $symbol,
            $status,
            $baseAsset,
            $baseAssetPrecision,
            $quoteAsset,
            $quotePrecision,
            $quoteAssetPrecision,
            $baseCommissionPrecision,
            $quoteCommissionPrecision,
            $orderTypes,
            $icebergAllowed,
            $ocoAllowed,
            $quoteOrderQtyMarketAllowed,
            $allowTrailingStop,
            $cancelReplaceAllowed,
            $isSpotTradingAllowed,
            $isMarginTradingAllowed,
            $filters
        );

        $this->assertInstanceOf(ExchangeInformationDTO::class, $dto);
        $this->assertSame($symbol, $dto->getSymbol());
        $this->assertSame($status, $dto->getStatus());
        $this->assertSame($baseAsset, $dto->getBaseAsset());
        $this->assertSame($baseAssetPrecision, $dto->getBaseAssetPrecision());
        $this->assertSame($quoteAsset, $dto->getQuoteAsset());
        $this->assertSame($quotePrecision, $dto->getQuotePrecision());
        $this->assertSame($quoteAssetPrecision, $dto->getQuoteAssetPrecision());
        $this->assertSame($baseCommissionPrecision, $dto->getBaseCommissionPrecision());
        $this->assertSame($quoteCommissionPrecision, $dto->getQuoteCommissionPrecision());
        $this->assertInstanceOf(OrderTypeCollection::class, $dto->getOrderTypes());
        $this->assertSame($orderTypes, $dto->getOrderTypes());
        $this->assertSame($icebergAllowed, $dto->isIcebergAllowed());
        $this->assertSame($ocoAllowed, $dto->isOcoAllowed());
        $this->assertSame($quoteOrderQtyMarketAllowed, $dto->isQuoteOrderQtyMarketAllowed());
        $this->assertSame($allowTrailingStop, $dto->isAllowTrailingStop());
        $this->assertSame($cancelReplaceAllowed, $dto->isCancelReplaceAllowed());
        $this->assertSame($isSpotTradingAllowed, $dto->isSpotTradingAllowed());
        $this->assertSame($isMarginTradingAllowed, $dto->isMarginTradingAllowed());
        $this->assertInstanceOf(FilterCollection::class, $dto->getFilters());
        $this->assertSame($filters, $dto->getFilters());
        $this->assertSame([
            'symbol' => $symbol,
            'status' => $status,
            'baseAsset' => $baseAsset,
            'baseAssetPrecision' => $baseAssetPrecision,
            'quoteAsset' => $quoteAsset,
            'quotePrecision' => $quotePrecision,
            'quoteAssetPrecision' => $quoteAssetPrecision,
            'baseCommissionPrecision' => $baseCommissionPrecision,
            'quoteCommissionPrecision' => $quoteCommissionPrecision,
            'orderTypes' => $expectedOrderTypes,
            'icebergAllowed' => $icebergAllowed,
            'ocoAllowed' => $ocoAllowed,
            'quoteOrderQtyMarketAllowed' => $quoteOrderQtyMarketAllowed,
            'allowTrailingStop' => $allowTrailingStop,
            'cancelReplaceAllowed' => $cancelReplaceAllowed,
            'isSpotTradingAllowed' => $isSpotTradingAllowed,
            'isMarginTradingAllowed' => $isMarginTradingAllowed,
            'filters' => $expectedFilters,
        ], $dto->toArray());
    }
}

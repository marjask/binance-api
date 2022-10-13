<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ExchangeInformation\Filter;

use Binance\DTO\ExchangeInformation\Filter\MarketLotSizeFilter;
use PHPUnit\Framework\TestCase;

final class MarketLotSizeFilterTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\ProviderData\MarketLotSizeFilterProviderData::data()
     */
    public function testValidFilter(
        string $filterType,
        string $minQty,
        string $maxQty,
        string $stepSize,
    ): void {
        $filter = new MarketLotSizeFilter(
            $filterType,
            $minQty,
            $maxQty,
            $stepSize,
        );

        $this->assertInstanceOf(MarketLotSizeFilter::class, $filter);
        $this->assertSame($filterType, $filter->getFilterType());
        $this->assertSame($minQty, $filter->getMinQty());
        $this->assertSame($maxQty, $filter->getMaxQty());
        $this->assertSame($stepSize, $filter->getStepSize());
        $this->assertSame([
            'minQty' => $minQty,
            'maxQty' => $maxQty,
            'stepSize' => $stepSize,
            'filterType' => $filterType,
        ], $filter->toArray());
    }

    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\ProviderData\MarketLotSizeFilterProviderData::invalidData()
     */
    public function testInvalidFilter(
        string $filterType,
        string $minQty,
        string $maxQty,
        string $stepSize,
    ): void {
        $this->expectException(\InvalidArgumentException::class);
        new MarketLotSizeFilter(
            $filterType,
            $minQty,
            $maxQty,
            $stepSize,
        );
    }
}

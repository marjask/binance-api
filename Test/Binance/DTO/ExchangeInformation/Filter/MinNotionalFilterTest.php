<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ExchangeInformation\Filter;

use Binance\DTO\ExchangeInformation\Filter\MinNotionalFilter;
use PHPUnit\Framework\TestCase;

final class MinNotionalFilterTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\ProviderData\MinNotionalFilterProviderData::data()
     */
    public function testValidFilter(
        string $filterType,
        string $minNotional,
        bool $applyToMarket,
        int $avgPriceMins
    ): void {
        $filter = new MinNotionalFilter(
            $filterType,
            $minNotional,
            $applyToMarket,
            $avgPriceMins,
        );

        $this->assertInstanceOf(MinNotionalFilter::class, $filter);
        $this->assertSame($filterType, $filter->getFilterType());
        $this->assertSame($minNotional, $filter->getMinNotional());
        $this->assertSame($applyToMarket, $filter->isApplyToMarket());
        $this->assertSame($avgPriceMins, $filter->getAvgPriceMins());
        $this->assertSame([
            'minNotional' => $minNotional,
            'applyToMarket' => $applyToMarket,
            'avgPriceMins' => $avgPriceMins,
            'filterType' => $filterType,
        ], $filter->toArray());
    }

    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\ProviderData\MinNotionalFilterProviderData::invalidData()
     */
    public function testInvalidFilter(
        string $filterType,
        string $minNotional,
        bool $applyToMarket,
        int $avgPriceMins
    ): void {
        $this->expectException(\InvalidArgumentException::class);
        new MinNotionalFilter(
            $filterType,
            $minNotional,
            $applyToMarket,
            $avgPriceMins,
        );
    }
}

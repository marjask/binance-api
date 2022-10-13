<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ExchangeInformation\Filter;

use Binance\DTO\ExchangeInformation\Filter\PercentPriceFilter;
use PHPUnit\Framework\TestCase;

final class PercentPriceFilterTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\ProviderData\PercentPriceFilterProviderData::data()
     */
    public function testValidFilter(
        string $filterType,
        string $multiplierUp,
        string $multiplierDown,
        int $avgPriceMins
    ): void {
        $filter = new PercentPriceFilter(
            $filterType,
            $multiplierUp,
            $multiplierDown,
            $avgPriceMins
        );

        $this->assertInstanceOf(PercentPriceFilter::class, $filter);
        $this->assertSame($filterType, $filter->getFilterType());
        $this->assertSame($multiplierUp, $filter->getMultiplierUp());
        $this->assertSame($multiplierDown, $filter->getMultiplierDown());
        $this->assertSame($avgPriceMins, $filter->getAvgPriceMins());
        $this->assertSame([
            'multiplierUp' => $multiplierUp,
            'multiplierDown' => $multiplierDown,
            'avgPriceMins' => $avgPriceMins,
            'filterType' => $filterType,
        ], $filter->toArray());
    }

    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\ProviderData\PercentPriceFilterProviderData::invalidData()
     */
    public function testInvalidFilter(
        string $filterType,
        string $multiplierUp,
        string $multiplierDown,
        int $avgPriceMins
    ): void {
        $this->expectException(\InvalidArgumentException::class);
        new PercentPriceFilter(
            $filterType,
            $multiplierUp,
            $multiplierDown,
            $avgPriceMins
        );
    }
}

<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ExchangeInformation\Filter;

use Binance\DTO\ExchangeInformation\Filter\PriceFilter;
use PHPUnit\Framework\TestCase;

final class PriceFilterTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\ProviderData\PriceFilterProviderData::data()
     */
    public function testValidFilter(
        string $filterType,
        string $minPrice,
        string $maxPrice,
        string $tickSize,
    ): void {
        $filter = new PriceFilter(
            $filterType,
            $minPrice,
            $maxPrice,
            $tickSize
        );

        $this->assertInstanceOf(PriceFilter::class, $filter);
        $this->assertSame($filterType, $filter->getFilterType());
        $this->assertSame($minPrice, $filter->getMinPrice());
        $this->assertSame($maxPrice, $filter->getMaxPrice());
        $this->assertSame($tickSize, $filter->getTickSize());
        $this->assertSame([
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'tickSize' => $tickSize,
            'filterType' => $filterType,
        ], $filter->toArray());
    }

    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\ProviderData\PriceFilterProviderData::invalidData()
     */
    public function testInvalidFilter(
        string $filterType,
        string $minPrice,
        string $maxPrice,
        string $tickSize,
    ): void {
        $this->expectException(\InvalidArgumentException::class);
        new PriceFilter(
            $filterType,
            $minPrice,
            $maxPrice,
            $tickSize
        );
    }
}

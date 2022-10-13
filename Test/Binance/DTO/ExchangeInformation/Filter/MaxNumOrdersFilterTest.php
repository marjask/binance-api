<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ExchangeInformation\Filter;

use Binance\DTO\ExchangeInformation\Filter\MaxNumOrdersFilter;
use PHPUnit\Framework\TestCase;

final class MaxNumOrdersFilterTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\ProviderData\MaxNumOrdersFilterProviderData::data()
     */
    public function testValidFilter(
        string $filterType,
        int $maxNumOrders,
    ): void {
        $filter = new MaxNumOrdersFilter(
            $filterType,
            $maxNumOrders
        );

        $this->assertInstanceOf(MaxNumOrdersFilter::class, $filter);
        $this->assertSame($filterType, $filter->getFilterType());
        $this->assertSame($maxNumOrders, $filter->getMaxNumOrders());
        $this->assertSame([
            'maxNumOrders' => $maxNumOrders,
            'filterType' => $filterType,
        ], $filter->toArray());
    }

    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\ProviderData\MaxNumOrdersFilterProviderData::invalidData()
     */
    public function testInvalidFilter(
        string $filterType,
        int $maxNumOrders,
    ): void {
        $this->expectException(\InvalidArgumentException::class);
        new MaxNumOrdersFilter(
            $filterType,
            $maxNumOrders
        );
    }
}

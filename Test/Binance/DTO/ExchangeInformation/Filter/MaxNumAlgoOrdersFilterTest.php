<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ExchangeInformation\Filter;

use Binance\DTO\ExchangeInformation\Filter\MaxNumAlgoOrdersFilter;
use PHPUnit\Framework\TestCase;

final class MaxNumAlgoOrdersFilterTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\ProviderData\MaxNumAlgoOrdersFilterProviderData::data()
     */
    public function testValidFilter(
        string $filterType,
        int $maxNumAlgoOrders,
    ): void {
        $filter = new MaxNumAlgoOrdersFilter(
            $filterType,
            $maxNumAlgoOrders
        );

        $this->assertInstanceOf(MaxNumAlgoOrdersFilter::class, $filter);
        $this->assertSame($filterType, $filter->getFilterType());
        $this->assertSame($maxNumAlgoOrders, $filter->getMaxNumAlgoOrders());
        $this->assertSame([
            'maxNumAlgoOrders' => $maxNumAlgoOrders,
            'filterType' => $filterType,
        ], $filter->toArray());
    }

    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\ProviderData\MaxNumAlgoOrdersFilterProviderData::invalidData()
     */
    public function testInvalidFilter(
        string $filterType,
        int $maxNumAlgoOrders,
    ): void {
        $this->expectException(\InvalidArgumentException::class);
        new MaxNumAlgoOrdersFilter(
            $filterType,
            $maxNumAlgoOrders
        );
    }
}

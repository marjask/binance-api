<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ExchangeInformation\Filter;

use Binance\DTO\ExchangeInformation\Filter\TrailingDeltaFilter;
use PHPUnit\Framework\TestCase;

final class TrailingDeltaFilterTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\ProviderData\TrailingDeltaFilterProviderData::data()
     */
    public function testValidFilter(
        string $filterType,
        int $minTrailingAboveDelta,
        int $maxTrailingAboveDelta,
        int $minTrailingBelowDelta,
        int $maxTrailingBelowDelta
    ): void {
        $filter = new TrailingDeltaFilter(
            $filterType,
            $minTrailingAboveDelta,
            $maxTrailingAboveDelta,
            $minTrailingBelowDelta,
            $maxTrailingBelowDelta
        );

        $this->assertInstanceOf(TrailingDeltaFilter::class, $filter);
        $this->assertSame($filterType, $filter->getFilterType());
        $this->assertSame($minTrailingAboveDelta, $filter->getMinTrailingAboveDelta());
        $this->assertSame($maxTrailingAboveDelta, $filter->getMaxTrailingAboveDelta());
        $this->assertSame($minTrailingBelowDelta, $filter->getMinTrailingBelowDelta());
        $this->assertSame($maxTrailingBelowDelta, $filter->getMaxTrailingBelowDelta());
        $this->assertSame([
            'minTrailingAboveDelta' => $minTrailingAboveDelta,
            'maxTrailingAboveDelta' => $maxTrailingAboveDelta,
            'minTrailingBelowDelta' => $minTrailingBelowDelta,
            'maxTrailingBelowDelta' => $maxTrailingBelowDelta,
            'filterType' => $filterType,
        ], $filter->toArray());
    }

    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\ProviderData\TrailingDeltaFilterProviderData::invalidData()
     */
    public function testInvalidFilter(
        string $filterType,
        int $minTrailingAboveDelta,
        int $maxTrailingAboveDelta,
        int $minTrailingBelowDelta,
        int $maxTrailingBelowDelta,
    ): void {
        $this->expectException(\InvalidArgumentException::class);
        new TrailingDeltaFilter(
            $filterType,
            $minTrailingAboveDelta,
            $maxTrailingAboveDelta,
            $minTrailingBelowDelta,
            $maxTrailingBelowDelta
        );
    }
}

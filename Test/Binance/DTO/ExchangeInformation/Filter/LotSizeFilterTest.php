<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ExchangeInformation\Filter;

use Binance\DTO\ExchangeInformation\Filter\LotSizeFilter;
use PHPUnit\Framework\TestCase;

final class LotSizeFilterTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\ProviderData\LotSizeFilterProviderData::data()
     */
    public function testValidFilter(
        string $filterType,
        string $minQty,
        string $maxQty,
        string $stepSize,
    ): void {
        $filter = new LotSizeFilter(
            $filterType,
            $minQty,
            $maxQty,
            $stepSize,
        );

        $this->assertInstanceOf(LotSizeFilter::class, $filter);
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
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\ProviderData\LotSizeFilterProviderData::invalidData()
     */
    public function testInvalidFilter(
        string $filterType,
        string $minQty,
        string $maxQty,
        string $stepSize,
    ): void {
        $this->expectException(\InvalidArgumentException::class);
        new LotSizeFilter(
            $filterType,
            $minQty,
            $maxQty,
            $stepSize,
        );
    }
}

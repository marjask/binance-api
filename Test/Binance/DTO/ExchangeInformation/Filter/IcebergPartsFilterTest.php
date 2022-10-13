<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ExchangeInformation\Filter;

use Binance\DTO\ExchangeInformation\Filter\IcebergPartsFilter;
use PHPUnit\Framework\TestCase;

final class IcebergPartsFilterTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\ProviderData\IcebergPartsFilterProviderData::data()
     */
    public function testValidFilter(
        string $filterType,
        int $limit,
    ): void {
        $filter = new IcebergPartsFilter(
            $filterType,
            $limit
        );

        $this->assertInstanceOf(IcebergPartsFilter::class, $filter);
        $this->assertSame($filterType, $filter->getFilterType());
        $this->assertSame($limit, $filter->getLimit());
        $this->assertSame([
            'limit' => $limit,
            'filterType' => $filterType,
        ], $filter->toArray());
    }

    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\ProviderData\IcebergPartsFilterProviderData::invalidData()
     */
    public function testInvalidFilter(
        string $filterType,
        int $limit,
    ): void {
        $this->expectException(\InvalidArgumentException::class);
        new IcebergPartsFilter(
            $filterType,
            $limit
        );
    }
}

<?php

declare(strict_types=1);

namespace Test\Binance\DTO\ExchangeInformation\Filter\Factory;

use Binance\DTO\ExchangeInformation\Filter\Factory\FilterFactory;
use Binance\DTO\ExchangeInformation\Filter\IcebergPartsFilter;
use Binance\DTO\ExchangeInformation\Filter\LotSizeFilter;
use Binance\DTO\ExchangeInformation\Filter\MarketLotSizeFilter;
use Binance\DTO\ExchangeInformation\Filter\MaxNumAlgoOrdersFilter;
use Binance\DTO\ExchangeInformation\Filter\MaxNumOrdersFilter;
use Binance\DTO\ExchangeInformation\Filter\MinNotionalFilter;
use Binance\DTO\ExchangeInformation\Filter\PercentPriceFilter;
use Binance\DTO\ExchangeInformation\Filter\PriceFilter;
use PHPUnit\Framework\TestCase;

final class FilterFactoryTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\Factory\ProviderData\FilterFactoryProviderData::dataToCreateFilter
     */
    public function testCreateFilterFromArray(array $data, string $expectedFilter): void
    {
        $filter = FilterFactory::createFilterFromArray($data);

        $this->assertInstanceOf($expectedFilter, $filter);
    }

    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\Factory\ProviderData\FilterFactoryProviderData::dataToEmptyFilterType()
     */
    public function testExceptionEmptyFilterType(array $data): void
    {
        $this->expectException(\InvalidArgumentException::class);
        FilterFactory::createFilterFromArray($data);
    }

    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\Factory\ProviderData\FilterFactoryProviderData::dataInvalidFilterType()
     */
    public function testExceptionInvalidFilterType(array $data): void
    {
        $this->expectException(\UnexpectedValueException::class);
        FilterFactory::createFilterFromArray($data);
    }

    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\Factory\ProviderData\FilterFactoryProviderData::dataToCreatePriceFilter()
     */
    public function testCreatePriceFilterFromArray(
        array $data,
        string $expectedFilter,
        string $expectedMinPrice,
        string $expectedMaxPrice,
        string $expectedTickSize,
    ): void {
        /** @var PriceFilter $filter */
        $filter = FilterFactory::createFilterFromArray($data);

        $this->assertInstanceOf($expectedFilter, $filter);
        $this->assertSame($expectedMinPrice, $filter->getMinPrice());
        $this->assertSame($expectedMaxPrice, $filter->getMaxPrice());
        $this->assertSame($expectedTickSize, $filter->getTickSize());
    }

    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\Factory\ProviderData\FilterFactoryProviderData::dataToCreatePercentPriceFilter()
     */
    public function testCreatePercentPriceFilterFromArray(
        array $data,
        string $expectedFilter,
        string $expectedMultiplierUp,
        string $expectedMultiplierDown,
        int $expectedAvgPriceMins,
    ): void {
        /** @var PercentPriceFilter $filter */
        $filter = FilterFactory::createFilterFromArray($data);

        $this->assertInstanceOf($expectedFilter, $filter);
        $this->assertSame($expectedMultiplierUp, $filter->getMultiplierUp());
        $this->assertSame($expectedMultiplierDown, $filter->getMultiplierDown());
        $this->assertSame($expectedAvgPriceMins, $filter->getAvgPriceMins());
    }

    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\Factory\ProviderData\FilterFactoryProviderData::dataToCreateMinNotionalFilter()
     */
    public function testCreateMinNotionalFilterFromArray(
        array $data,
        string $expectedFilter,
        string $expectedMinNotional,
        bool $expectedApplyToMarket,
        int $expectedAvgPriceMins,
    ): void {
        /** @var MinNotionalFilter $filter */
        $filter = FilterFactory::createFilterFromArray($data);

        $this->assertInstanceOf($expectedFilter, $filter);
        $this->assertSame($expectedMinNotional, $filter->getMinNotional());
        $this->assertSame($expectedApplyToMarket, $filter->isApplyToMarket());
        $this->assertSame($expectedAvgPriceMins, $filter->getAvgPriceMins());
    }

    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\Factory\ProviderData\FilterFactoryProviderData::dataToCreateMaxNumOrdersFilter()
     */
    public function testCreateMaxNumOrdersFilterFromArray(
        array $data,
        string $expectedFilter,
        int $expectedMaxNumOrders,
    ): void {
        /** @var MaxNumOrdersFilter $filter */
        $filter = FilterFactory::createFilterFromArray($data);

        $this->assertInstanceOf($expectedFilter, $filter);
        $this->assertSame($expectedMaxNumOrders, $filter->getMaxNumOrders());
    }

    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\Factory\ProviderData\FilterFactoryProviderData::dataToCreateMaxNumAlgoOrdersFilter()
     */
    public function testCreateMaxNumAlgoOrdersFilterFromArray(
        array $data,
        string $expectedFilter,
        int $maxNumAlgoOrders,
    ): void {
        /** @var MaxNumAlgoOrdersFilter $filter */
        $filter = FilterFactory::createFilterFromArray($data);

        $this->assertInstanceOf($expectedFilter, $filter);
        $this->assertSame($maxNumAlgoOrders, $filter->getMaxNumAlgoOrders());
    }

    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\Factory\ProviderData\FilterFactoryProviderData::dataToCreateMarketLotSizeFilter()
     */
    public function testCreateMarketLotSizeFilterFromArray(
        array $data,
        string $expectedFilter,
        string $expectedMinQty,
        string $expectedMaxQty,
        string $expectedStepSize,
    ): void {
        /** @var MarketLotSizeFilter $filter */
        $filter = FilterFactory::createFilterFromArray($data);

        $this->assertInstanceOf($expectedFilter, $filter);
        $this->assertSame($expectedMinQty, $filter->getMinQty());
        $this->assertSame($expectedMaxQty, $filter->getMaxQty());
        $this->assertSame($expectedStepSize, $filter->getStepSize());
    }

    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\Factory\ProviderData\FilterFactoryProviderData::dataToCreateLotSizeFilter()
     */
    public function testCreateLotSizeFilterFromArray(
        array $data,
        string $expectedFilter,
        string $expectedMinQty,
        string $expectedMaxQty,
        string $expectedStepSize,
    ): void {
        /** @var LotSizeFilter $filter */
        $filter = FilterFactory::createFilterFromArray($data);

        $this->assertInstanceOf($expectedFilter, $filter);
        $this->assertSame($expectedMinQty, $filter->getMinQty());
        $this->assertSame($expectedMaxQty, $filter->getMaxQty());
        $this->assertSame($expectedStepSize, $filter->getStepSize());
    }

    /**
     * @dataProvider \Test\Binance\DTO\ExchangeInformation\Filter\Factory\ProviderData\FilterFactoryProviderData::dataToCreateIcebergPartsFilter()
     */
    public function testCreateIcebergPartsFilterFromArray(
        array $data,
        string $expectedFilter,
        int $expectedLimit,
    ): void {
        /** @var IcebergPartsFilter $filter */
        $filter = FilterFactory::createFilterFromArray($data);

        $this->assertInstanceOf($expectedFilter, $filter);
        $this->assertSame($expectedLimit, $filter->getLimit());
    }
}

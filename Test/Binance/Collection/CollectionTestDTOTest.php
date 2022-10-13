<?php

declare(strict_types=1);

namespace Test\Binance\Collection;

use PHPUnit\Framework\TestCase;
use Test\Binance\Collection\ProviderData\TestDTO;
use Test\Binance\Collection\ProviderData\TestDTOCollection;

final class CollectionTestDTOTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\Collection\ProviderData\CollectionTestDTOProviderData::oneElementProviderData
     */
    public function testOneElement(TestDTO $dto, array $expectedArray): void
    {
        $collection = new TestDTOCollection();
        $collection->add($dto);

        $this->assertInstanceOf(TestDTOCollection::class, $collection);
        $this->assertInstanceOf(TestDTO::class, $collection->first());
        $this->assertInstanceOf(TestDTO::class, $collection->last());
        $this->assertInstanceOf(\ArrayIterator::class, $collection->getIterator());
        $this->assertCount(1, $collection);
        $this->assertFalse($collection->isEmpty());
        $this->assertIsArray($collection->toArray());
        $this->assertIsArray($collection->asArray());
        $this->assertSame($expectedArray, $collection->toArray());
    }

    /**
     * @dataProvider \Test\Binance\Collection\ProviderData\CollectionTestDTOProviderData::twoElementsProviderData
     */
    public function testTwoElements(TestDTO $dto1, TestDTO $dto2, array $expectedArray): void
    {
        $collection = new TestDTOCollection();
        $collection->add($dto1);
        $collection->add($dto2);

        $this->assertInstanceOf(TestDTOCollection::class, $collection);
        $this->assertInstanceOf(TestDTO::class, $collection->first());
        $this->assertInstanceOf(TestDTO::class, $collection->last());
        $this->assertInstanceOf(\ArrayIterator::class, $collection->getIterator());
        $this->assertCount(2, $collection);
        $this->assertFalse($collection->isEmpty());
        $this->assertIsArray($collection->toArray());
        $this->assertIsArray($collection->asArray());
        $this->assertSame($expectedArray, $collection->toArray());
    }

    /**
     * @dataProvider \Test\Binance\Collection\ProviderData\CollectionTestDTOProviderData::twoElementsProviderData
     */
    public function testMergeElements(TestDTO $dto1, TestDTO $dto2, array $expectedArray): void
    {
        $collection1 = new TestDTOCollection();
        $collection2 = new TestDTOCollection();
        $collection1->add($dto1);
        $collection2->add($dto2);

        $collectionMerged = $collection1->mergeWith($collection2);

        $this->assertInstanceOf(TestDTOCollection::class, $collectionMerged);
        $this->assertInstanceOf(TestDTO::class, $collectionMerged->first());
        $this->assertInstanceOf(TestDTO::class, $collectionMerged->last());
        $this->assertInstanceOf(\ArrayIterator::class, $collectionMerged->getIterator());
        $this->assertCount(2, $collectionMerged);
        $this->assertFalse($collectionMerged->isEmpty());
        $this->assertIsArray($collectionMerged->toArray());
        $this->assertIsArray($collectionMerged->asArray());
        $this->assertSame($expectedArray, $collectionMerged->toArray());
    }

    /**
     * @dataProvider \Test\Binance\Collection\ProviderData\CollectionTestDTOProviderData::twoElementsProviderData
     */
    public function testFromArrayElements(TestDTO $dto1, TestDTO $dto2, array $expectedArray): void
    {
        $collection = TestDTOCollection::fromArray([
            $dto1,
            $dto2,
        ]);

        $this->assertInstanceOf(TestDTOCollection::class, $collection);
        $this->assertInstanceOf(TestDTO::class, $collection->first());
        $this->assertInstanceOf(TestDTO::class, $collection->last());
        $this->assertInstanceOf(\ArrayIterator::class, $collection->getIterator());
        $this->assertCount(2, $collection);
        $this->assertFalse($collection->isEmpty());
        $this->assertIsArray($collection->toArray());
        $this->assertIsArray($collection->asArray());
        $this->assertSame($expectedArray, $collection->toArray());
    }
}

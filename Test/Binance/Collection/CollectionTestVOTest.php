<?php

declare(strict_types=1);

namespace Test\Binance\Collection;

use PHPUnit\Framework\TestCase;
use Test\Binance\Collection\ProviderData\TestVO;
use Test\Binance\Collection\ProviderData\TestVOCollection;

final class CollectionTestVOTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\Collection\ProviderData\CollectionTestVOProviderData::oneElementProviderData
     */
    public function testOneElement(TestVO $vo, array $expectedArray): void
    {
        $collection = new TestVOCollection();
        $collection->add($vo);

        $this->assertInstanceOf(TestVOCollection::class, $collection);
        $this->assertInstanceOf(TestVO::class, $collection->first());
        $this->assertInstanceOf(TestVO::class, $collection->last());
        $this->assertInstanceOf(\ArrayIterator::class, $collection->getIterator());
        $this->assertCount(1, $collection);
        $this->assertFalse($collection->isEmpty());
        $this->assertIsArray($collection->toArray());
        $this->assertIsArray($collection->asArray());
        $this->assertSame($expectedArray, $collection->toArray());
    }

    /**
     * @dataProvider \Test\Binance\Collection\ProviderData\CollectionTestVOProviderData::twoElementsProviderData
     */
    public function testTwoElements(TestVO $vo1, TestVO $vo2, array $expectedArray): void
    {
        $collection = new TestVOCollection();
        $collection->add($vo1);
        $collection->add($vo2);

        $this->assertInstanceOf(TestVOCollection::class, $collection);
        $this->assertInstanceOf(TestVO::class, $collection->first());
        $this->assertInstanceOf(TestVO::class, $collection->last());
        $this->assertInstanceOf(\ArrayIterator::class, $collection->getIterator());
        $this->assertCount(2, $collection);
        $this->assertFalse($collection->isEmpty());
        $this->assertIsArray($collection->toArray());
        $this->assertIsArray($collection->asArray());
        $this->assertSame($expectedArray, $collection->toArray());
    }

    /**
     * @dataProvider \Test\Binance\Collection\ProviderData\CollectionTestVOProviderData::twoElementsProviderData
     */
    public function testMergeElements(TestVO $vo1, TestVO $vo2, array $expectedArray): void
    {
        $collection1 = new TestVOCollection();
        $collection2 = new TestVOCollection();
        $collection1->add($vo1);
        $collection2->add($vo2);

        $collectionMerged = $collection1->mergeWith($collection2);

        $this->assertInstanceOf(TestVOCollection::class, $collectionMerged);
        $this->assertInstanceOf(TestVO::class, $collectionMerged->first());
        $this->assertInstanceOf(TestVO::class, $collectionMerged->last());
        $this->assertInstanceOf(\ArrayIterator::class, $collectionMerged->getIterator());
        $this->assertCount(2, $collectionMerged);
        $this->assertFalse($collectionMerged->isEmpty());
        $this->assertIsArray($collectionMerged->toArray());
        $this->assertIsArray($collectionMerged->asArray());
        $this->assertSame($expectedArray, $collectionMerged->toArray());
    }

    /**
     * @dataProvider \Test\Binance\Collection\ProviderData\CollectionTestVOProviderData::twoElementsProviderData
     */
    public function testFromArrayElements(TestVO $dto1, TestVO $dto2, array $expectedArray): void
    {
        $collection = TestVOCollection::fromArray([
            $dto1,
            $dto2,
        ]);

        $this->assertInstanceOf(TestVOCollection::class, $collection);
        $this->assertInstanceOf(TestVO::class, $collection->first());
        $this->assertInstanceOf(TestVO::class, $collection->last());
        $this->assertInstanceOf(\ArrayIterator::class, $collection->getIterator());
        $this->assertCount(2, $collection);
        $this->assertFalse($collection->isEmpty());
        $this->assertIsArray($collection->toArray());
        $this->assertIsArray($collection->asArray());
        $this->assertSame($expectedArray, $collection->toArray());
    }
}

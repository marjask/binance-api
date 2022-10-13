<?php

declare(strict_types=1);

namespace Test\Binance\Collection\ProviderData;

use Binance\Collection\AbstractCollection;

final class TestVOCollection extends AbstractCollection
{
    protected function getCollectionType(): string
    {
        return TestVO::class;
    }
}

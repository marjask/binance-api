<?php

declare(strict_types=1);

namespace Test\Binance\Collection\ProviderData;

use Trait\ToArray\ToArrayTrait;

final class TestDTO
{
    use ToArrayTrait;

    public function __construct(
        private readonly string $test
    ) {
    }
}

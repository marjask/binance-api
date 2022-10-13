<?php

declare(strict_types=1);

namespace Test\Binance\DTO;

use Binance\DTO\BalanceDTO;
use PHPUnit\Framework\TestCase;

final class BalanceDTOTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\ProviderData\BalanceDTOProviderData::data
     */
    public function testDTO(
        string $asset,
        string $free,
        string $locked,
    ): void {
        $dto = new BalanceDTO($asset, $free, $locked);

        $this->assertInstanceOf(BalanceDTO::class, $dto);
        $this->assertSame($asset, $dto->getAsset());
        $this->assertSame($free, $dto->getFree());
        $this->assertSame($locked, $dto->getLocked());
        $this->assertSame([
            'asset' => $asset,
            'free' => $free,
            'locked' => $locked,
        ], $dto->toArray());
    }
}

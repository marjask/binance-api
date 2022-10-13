<?php

declare(strict_types=1);

namespace Test\Binance\DTO;

use Binance\DTO\CurrentOrderCountUsageDTO;
use PHPUnit\Framework\TestCase;

final class CurrentOrderCountUsageDTOTest extends TestCase
{
    /**
     * @dataProvider \Test\Binance\DTO\ProviderData\CurrentOrderCountUsageDTOProviderData::data()
     */
    public function testDTO(
        string $rateLimitType,
        string $interval,
        int $intervalNum,
        int $limit,
        int $count
    ): void {
        $dto = new CurrentOrderCountUsageDTO($rateLimitType, $interval, $intervalNum, $limit, $count);

        $this->assertInstanceOf(CurrentOrderCountUsageDTO::class, $dto);
        $this->assertSame($rateLimitType, $dto->getRateLimitType());
        $this->assertSame($interval, $dto->getInterval());
        $this->assertSame($intervalNum, $dto->getIntervalNum());
        $this->assertSame($limit, $dto->getLimit());
        $this->assertSame($count, $dto->getCount());
        $this->assertSame([
            'rateLimitType' => $rateLimitType,
            'interval' => $interval,
            'intervalNum' => $intervalNum,
            'limit' => $limit,
            'count' => $count,
        ], $dto->toArray());
    }
}

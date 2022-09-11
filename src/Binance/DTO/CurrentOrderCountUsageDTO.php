<?php

declare(strict_types=1);

namespace Binance\DTO;

use Trait\ToArray\ToArrayTrait;

final class CurrentOrderCountUsageDTO
{
    use ToArrayTrait;

    public function __construct(
        private readonly string $rateLimitType,
        private readonly string $interval,
        private readonly int $intervalNum,
        private readonly int $limit,
        private readonly int $count
    ) {
    }

    public function getRateLimitType(): string
    {
        return $this->rateLimitType;
    }

    public function getInterval(): string
    {
        return $this->interval;
    }

    public function getIntervalNum(): int
    {
        return $this->intervalNum;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getCount(): int
    {
        return $this->count;
    }
}

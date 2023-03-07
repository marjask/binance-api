<?php

declare(strict_types=1);

namespace Binance\DTO;

use Trait\ToArray\ToArrayTrait;

final class CandlestickDataDTO
{
    use ToArrayTrait;

    public function __construct(
        private readonly int $openTime,
        private readonly float $open,
        private readonly float $high,
        private readonly float $low,
        private readonly float $close,
        private readonly float $volume,
        private readonly int $closeTime,
        private readonly float $quoteAssetVolume,
        private readonly int $numberOfTrades,
        private readonly float $takerBuyBaseAssetVolume,
        private readonly float $takerBuyQuoteAssetVolume
    ) {
    }

    public function getOpenTime(): int
    {
        return $this->openTime;
    }

    public function getOpen(): float
    {
        return $this->open;
    }

    public function getHigh(): float
    {
        return $this->high;
    }

    public function getLow(): float
    {
        return $this->low;
    }

    public function getClose(): float
    {
        return $this->close;
    }

    public function getVolume(): float
    {
        return $this->volume;
    }

    public function getCloseTime(): int
    {
        return $this->closeTime;
    }

    public function getQuoteAssetVolume(): float
    {
        return $this->quoteAssetVolume;
    }

    public function getNumberOfTrades(): int
    {
        return $this->numberOfTrades;
    }

    public function getTakerBuyBaseAssetVolume(): float
    {
        return $this->takerBuyBaseAssetVolume;
    }

    public function getTakerBuyQuoteAssetVolume(): float
    {
        return $this->takerBuyQuoteAssetVolume;
    }
}

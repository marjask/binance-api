<?php

declare(strict_types=1);

namespace Binance\DTO\Collection;

use Binance\Collection\AbstractCollection;
use Binance\DTO\CandlestickDataDTO;
use Binance\DTO\Factory\CandlestickDataDTOFactory;

final class CandlestickDataDTOCollection extends AbstractCollection
{
    protected function getCollectionType(): string
    {
        return CandlestickDataDTO::class;
    }

    public function convertToNewTf(int $newTf): self
    {
        $newCollection = new self();
        $candleData = [];

        $count = $this->count();
        $newSize = (int)ceil($count / $newTf);
        $dataArray = $this->toArray();

        for ($i = 0; $i < $newSize; $i++) {
            $data = array_slice($dataArray, $i * $newTf, $newTf);

            $candleData[0] = min(array_column($data, 'openTime'));
            $candleData[1] = array_sum(array_column($data, 'open')) / $newTf;
            $candleData[2] = array_sum(array_column($data, 'high')) / $newTf;
            $candleData[3] = array_sum(array_column($data, 'low')) / $newTf;
            $candleData[4] = array_sum(array_column($data, 'close')) / $newTf;
            $candleData[5] = array_sum(array_column($data, 'volume')) / $newTf;
            $candleData[6] = max(array_column($data, 'closeTime'));
            $candleData[7] = array_sum(array_column($data, 'quoteAssetVolume')) / $newTf;
            $candleData[8] = array_sum(array_column($data, 'numberOfTrades'));
            $candleData[9] = array_sum(array_column($data, 'takerBuyBaseAssetVolume')) / $newTf;
            $candleData[10] = array_sum(array_column($data, 'takerBuyQuoteAssetVolume')) / $newTf;

            $newCollection->add(
                CandlestickDataDTOFactory::createFromArray($candleData)
            );
        }

        return $newCollection;
    }
}

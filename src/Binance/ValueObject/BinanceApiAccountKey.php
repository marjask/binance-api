<?php

declare(strict_types=1);

namespace Binance\ValueObject;

final class BinanceApiAccountKey
{
    public function __construct(
        protected readonly string $apiKey,
        protected readonly string $secretKey
    ) {
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function getSecretKey(): string
    {
        return $this->secretKey;
    }
}

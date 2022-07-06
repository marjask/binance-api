<?php

declare(strict_types=1);

namespace Binance\ValueObject;

final class BinanceApiAccountDetails
{
    public function __construct(
        protected string $apiKey,
        protected string $secretKey
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

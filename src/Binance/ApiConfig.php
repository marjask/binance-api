<?php

declare(strict_types=1);

namespace Binance;

final class ApiConfig
{
    private bool $testnetEnable = false;
    private bool $debug = false;
    private string $apiKey;
    private string $apiSecret;

    public function isTestnetEnable(): bool
    {
        return $this->testnetEnable;
    }

    public function setTestnetEnable(bool $testnetEnable = false): ApiConfig
    {
        $this->testnetEnable = $testnetEnable;

        return $this;
    }

    public function getApiUrl(): string
    {
        return $this->isTestnetEnable()
            ? ApiConst::API_URL_TESTNET
            : ApiConst::API_URL;
    }

    public function isDebug(): bool
    {
        return $this->debug;
    }

    public function setDebug(bool $debug = false): ApiConfig
    {
        $this->debug = $debug;

        return $this;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function setApiKey(string $apiKey): ApiConfig
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    public function getApiSecret(): string
    {
        return $this->apiSecret;
    }

    public function setApiSecret(string $apiSecret): ApiConfig
    {
        $this->apiSecret = $apiSecret;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'url' => $this->getApiUrl(),
            'debug' => $this->isDebug(),
            'apiKey' => $this->getApiKey(),
            'apiSecret' => $this->getApiSecret(),
        ];
    }
}

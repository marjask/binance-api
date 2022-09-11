<?php

declare(strict_types=1);

namespace Binance;

final class ApiConfig
{
    private bool $testnetEnable = false;
    private bool $debug = false;

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

    public function toArray(): array
    {
        return [
            'url' => $this->getApiUrl(),
            'debug' => $this->isDebug(),
        ];
    }
}

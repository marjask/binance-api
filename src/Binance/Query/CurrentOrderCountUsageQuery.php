<?php

declare(strict_types=1);

namespace Binance\Query;

use Binance\ValueObject\RecvWindow;

final class CurrentOrderCountUsageQuery extends GeneralOrderQuery
{
    protected RecvWindow $recvWindow;

    public function getRecvWindow(): RecvWindow
    {
        return $this->recvWindow;
    }

    public function setRecvWindow(RecvWindow $recvWindow): self
    {
        $this->recvWindow = $recvWindow;

        return $this;
    }
}

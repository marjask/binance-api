<?php

declare(strict_types=1);

namespace Binance\Query;

use Binance\ValueObject\RecvWindow;

final class AccountInformationQuery extends GeneralOrderQuery
{
    protected ?RecvWindow $recvWindow;

    public function __construct()
    {
        parent::__construct();

        $this->recvWindow = null;
    }

    public function getRecvWindow(): ?RecvWindow
    {
        return $this->recvWindow;
    }

    public function setRecvWindow(?RecvWindow $recvWindow): self
    {
        $this->recvWindow = $recvWindow;

        return $this;
    }
}

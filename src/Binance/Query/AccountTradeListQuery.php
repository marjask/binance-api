<?php

declare(strict_types=1);

namespace Binance\Query;

use Binance\ValueObject\Id;

final class AccountTradeListQuery extends AllOrdersQuery
{
    protected ?Id $fromId;

    public function __construct()
    {
        parent::__construct();

        $this->fromId = null;
    }

    public function getFromId(): ?Id
    {
        return $this->fromId;
    }

    public function setFromId(?Id $fromId): self
    {
        $this->fromId = $fromId;
        return $this;
    }
}

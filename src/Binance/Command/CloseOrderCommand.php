<?php

declare(strict_types=1);

namespace Binance\Command;

use Binance\ValueObject\Id;

final class CloseOrderCommand extends AbstractOrderCommand
{
    protected Id $orderId;
    protected Id $origClientOrderId;

    public function getOrderId(): Id
    {
        return $this->orderId;
    }

    public function setOrderId(Id $orderId): CloseOrderCommand
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getOrigClientOrderId(): Id
    {
        return $this->origClientOrderId;
    }

    public function setOrigClientOrderId(Id $origClientOrderId): CloseOrderCommand
    {
        $this->origClientOrderId = $origClientOrderId;

        return $this;
    }
}

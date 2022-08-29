<?php

declare(strict_types=1);

namespace Binance\Command;

use Binance\ValueObject\Id;
use Binance\ValueObject\Text;

final class CancelOrderCommand extends AbstractOrderCommand
{
    protected ?Id $orderId;
    protected ?Text $origClientOrderId;

    public function getOrderId(): Id
    {
        return $this->orderId;
    }

    public function setOrderId(Id $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getOrigClientOrderId(): Text
    {
        return $this->origClientOrderId;
    }

    public function setOrigClientOrderId(Text $origClientOrderId): self
    {
        $this->origClientOrderId = $origClientOrderId;

        return $this;
    }
}

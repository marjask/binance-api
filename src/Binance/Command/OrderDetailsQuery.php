<?php

declare(strict_types=1);

namespace Binance\Command;

use Binance\ValueObject\Id;
use Symfony\Component\Validator\Constraints as Assert;

final class OrderDetailsQuery extends AbstractOrderCommand
{
    protected ?Id $orderId;
    protected ?Id $origClientOrderId;

    public function getOrderId(): Id
    {
        return $this->orderId;
    }

    public function setOrderId(Id $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getOrigClientOrderId(): Id
    {
        return $this->origClientOrderId;
    }

    public function setOrigClientOrderId(Id $origClientOrderId): self
    {
        $this->origClientOrderId = $origClientOrderId;

        return $this;
    }

    public function getValidators(): array
    {
        return array_merge(
            parent::getValidators(), [
                'orderId' => new Assert\Optional([
                    new Assert\Type('int')
                ]),
                'origClientOrderId' => new Assert\Optional([
                    new Assert\Type('string')
                ]),
            ]
        );
    }
}

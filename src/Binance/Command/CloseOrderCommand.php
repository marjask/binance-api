<?php

declare(strict_types=1);

namespace Binance\Command;

use Binance\Validator\Constraint\AtLeastOneOfFields;
use Binance\ValueObject\Id;
use Binance\ValueObject\Text;
use Symfony\Component\Validator\Constraints as Assert;

final class CloseOrderCommand extends AbstractOrderCommand
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

    public function getValidators(): array
    {
        return [
            'fields' => array_merge(parent::getValidators(), [
                'orderId' => new Assert\Optional([
                    new Assert\Type('int'),
                ]),
                'origClientOrderId' => new Assert\Optional([
                    new Assert\Type('string'),
                ]),
                'symbol' => new Assert\Required([
                    new Assert\Type('string'),
                    new AtLeastOneOfFields([
                        'fields' => ['orderId', 'origClientOrderId'],
                    ]),
                ]),
            ]),
        ];
    }
}

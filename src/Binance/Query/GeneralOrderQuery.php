<?php

declare(strict_types=1);

namespace Binance\Query;

use Binance\ValueObject\Integer;
use Binance\ValueObject\Timestamp;
use Trait\ToArray\ToArrayTrait;

class GeneralOrderQuery
{
    use ToArrayTrait;

    protected Timestamp $timestamp;

    public function __construct()
    {
        $this->setTimestamp(
            new Timestamp()
        );
    }

    final public function getTimestamp(): Timestamp
    {
        return $this->timestamp;
    }

    final public function setTimestamp(Timestamp $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }
}

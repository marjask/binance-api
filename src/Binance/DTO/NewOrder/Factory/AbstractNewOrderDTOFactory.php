<?php

declare(strict_types=1);

namespace Binance\DTO\NewOrder\Factory;

use Binance\DTO\NewOrder\AbstractNewOrder;

abstract class AbstractNewOrderDTOFactory
{
    abstract public function createFromArray(array $data): AbstractNewOrder;
}

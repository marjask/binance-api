<?php

declare(strict_types=1);

namespace Binance\DTO\NewOrder\Factory;

use Binance\DTO\NewOrder\NewOrderTestDTO;

final class NewOrderTestDTOFactory extends AbstractNewOrderDTOFactory
{
    public function createFromArray(array $data): NewOrderTestDTO
    {
        return new NewOrderTestDTO(
            !isset($data['code']),
            $data['code'] ?? null,
            $data['msg'] ?? null,
        );
    }
}

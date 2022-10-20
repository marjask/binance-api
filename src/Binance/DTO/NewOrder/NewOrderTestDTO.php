<?php

declare(strict_types=1);

namespace Binance\DTO\NewOrder;

final class NewOrderTestDTO extends AbstractNewOrder
{
    public function __construct(
        private readonly bool $success,
        private readonly ?int $code,
        private readonly ?string $message,
    ) {
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }
}

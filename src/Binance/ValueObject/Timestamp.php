<?php

declare(strict_types=1);

namespace Binance\ValueObject;

use DateTime;
use InvalidArgumentException;
use Throwable;

final class Timestamp extends Integer
{
    public const MILLISECOND_MULTIPLIER = 1000;

    public function __construct(?int $seconds = null)
    {
        if (is_null($seconds)) {
            $seconds = time();
        }

        $value = $seconds * self::MILLISECOND_MULTIPLIER;

        if (!preg_match('#^\d{13}$#', (string) $value)) {
            throw new InvalidArgumentException(
                sprintf('Invalid timestamp: %s', $value)
            );
        }

        parent::__construct($value);
    }

    public static function fromString(string $string): self
    {
        try {
            return new self(
                (new DateTime($string))->getTimestamp()
            );
        } catch (Throwable $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }
}

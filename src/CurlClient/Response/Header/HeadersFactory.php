<?php

declare(strict_types=1);

namespace CurlClient\Response\Header;

use RuntimeException;

final class HeadersFactory
{
    private const REQUIRED_KEYS = [
        'http_code',
        'content-type',
    ];

    public static function createFromArray(array $headers): Headers
    {
        self::throwIfMissingKeys($headers);

        preg_match('#(\d{3})#', $headers['http_code'], $matchesHttpCode);
        [$contentType, $charset] = explode(';', $headers['content-type'], 2);
        $charset = explode('=', $charset, 2)[1];

        return new Headers(
            (int) $matchesHttpCode[1],
            $contentType,
            $charset,
            (int) ($headers['content-length'] ?? 0)
        );
    }

    private static function throwIfMissingKeys(array $array): void
    {
        $missingKeys = array_keys(array_diff_key(
            array_flip(self::REQUIRED_KEYS),
            $array
        ));

        if (!empty($missingKeys)) {
            throw new RuntimeException(
                sprintf(
                    'Missing keys. Required keys: %s',
                    implode(', ', $missingKeys)
                )
            );
        }
    }
}

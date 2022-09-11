<?php

declare(strict_types=1);

namespace CurlClient;

final class CurlClientConst
{
    public const GET = 'GET';
    public const POST = 'POST';
    public const DELETE = 'DELETE';
    public const PUT = 'PUT';

    public const METHODS = [
        self::GET,
        self::POST,
        self::PUT,
        self::DELETE,
    ];

    public const HTTP_204 = 204;
    public const EMPTY_RESPONSE = '';
}

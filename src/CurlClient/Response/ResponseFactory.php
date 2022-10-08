<?php

declare(strict_types=1);

namespace CurlClient\Response;

use CurlClient\Response\Header\HeadersFactory;

final class ResponseFactory
{
    public static function create(array $headers, array $data): Response
    {
        return new Response(
            HeadersFactory::createFromArray($headers),
            $data
        );
    }

    public static function createResponseError(array $headers, ?array $data): ResponseError
    {
        return new ResponseError(
            HeadersFactory::createFromArray($headers),
            $data
        );
    }
}

<?php

declare(strict_types=1);

namespace CurlClient\Response\Header;

final class Headers
{
    public function __construct(
        private readonly int $httpCode,
        private readonly string $contentType,
        private readonly string $charset,
        private readonly int $contentLength
    ) {
    }

    public function getHttpCode(): int
    {
        return $this->httpCode;
    }

    public function getContentType(): string
    {
        return $this->contentType;
    }

    public function getCharset(): string
    {
        return $this->charset;
    }

    public function getContentLength(): int
    {
        return $this->contentLength;
    }
}

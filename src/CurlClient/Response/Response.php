<?php

declare(strict_types=1);

namespace CurlClient\Response;

use CurlClient\Response\Header\Headers;

class Response
{
    public function __construct(
        protected Headers $headers,
        protected array $data
    ) {
    }

    public function getHeaders(): Headers
    {
        return $this->headers;
    }

    public function getData(): array
    {
        return $this->data;
    }
}

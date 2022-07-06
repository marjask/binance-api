<?php

declare(strict_types=1);

namespace CurlClient\Response;

abstract class AbstractResponse
{
    public function __construct(
        protected $header,
        protected $json
    ) {
    }

    public function getHeader()
    {
        return $this->header;
    }

    public function getJson()
    {
        return $this->json;
    }
}

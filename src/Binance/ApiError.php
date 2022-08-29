<?php

declare(strict_types=1);

namespace Binance;

use CurlClient\Response\ResponseError;
use CurlClient\Response\Header\Headers;

class ApiError
{
    private Headers $headers;
    private ?int $code;
    private ?string $msg;

    public function __construct(
        ResponseError $errorResponse
    ) {
        $this->headers = $errorResponse->getHeaders();
        $this->code = $errorResponse->getErrorCode();
        $this->msg = $errorResponse->getMsg();
    }

    public function getResponseCode(): int
    {
        return $this->headers->getHttpCode();
    }

    public function getErrorCode(): int
    {
        return $this->code;
    }

    public function getMsg(): string
    {
        return $this->msg;
    }
}

<?php

declare(strict_types=1);

namespace CurlClient\Response;

use CurlClient\Response\Header\Headers;

final class ResponseError extends Response
{
    protected ?int $errorCode;
    protected ?string $msg;

    public function __construct(Headers $header, array $data)
    {
        parent::__construct($header, $data);

        $this->errorCode = $data['code'] ?? null;
        $this->msg = $data['msg'] ?? null;
    }

    public function getErrorCode(): ?int
    {
        return $this->errorCode;
    }

    public function getMsg(): ?string
    {
        return $this->msg;
    }
}

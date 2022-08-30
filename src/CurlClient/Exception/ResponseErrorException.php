<?php

declare(strict_types=1);

namespace CurlClient\Exception;

use CurlClient\Response\ResponseError;
use RuntimeException;

class ResponseErrorException extends RuntimeException
{
    private const MESSAGE = 'Connection problem.';

    public function __construct(
        private readonly ResponseError $errorResponse
    ) {
        parent::__construct(self::MESSAGE);
    }

    public function getErrorResponse(): ResponseError
    {
        return $this->errorResponse;
    }
}

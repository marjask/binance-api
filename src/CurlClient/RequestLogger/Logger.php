<?php

declare(strict_types=1);

namespace CurlClient\RequestLogger;

use CurlClient\RequestLogger\Command\CreateRequestLogCommand;
use CurlClient\RequestLogger\Source\AbstractSource;
use CurlClient\RequestLogger\Validator\CreateRequestLogCommandValidator;

class Logger
{
    public function __construct(
        protected AbstractSource $source
    ) {
    }

    public function logRequest(CreateRequestLogCommand $command): void
    {
        CreateRequestLogCommandValidator::create()->throwIfInvalid($command);

        $this->source->createLog($command);
    }
}

<?php

declare(strict_types=1);

namespace CurlClient\RequestLogger\Source;

use CurlClient\RequestLogger\Command\CreateRequestLogCommand;

abstract class AbstractSource
{
    abstract public function createLog(CreateRequestLogCommand $command): void;
}

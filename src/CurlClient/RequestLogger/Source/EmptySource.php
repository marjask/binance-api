<?php

declare(strict_types=1);

namespace CurlClient\RequestLogger\Source;

use CurlClient\RequestLogger\Command\CreateRequestLogCommand;

final class EmptySource extends AbstractSource
{
    public function createLog(CreateRequestLogCommand $command): void
    {
        // not add record
    }
}

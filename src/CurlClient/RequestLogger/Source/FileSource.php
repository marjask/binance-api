<?php

declare(strict_types=1);

namespace CurlClient\RequestLogger\Source;

use CurlClient\RequestLogger\Command\CreateRequestLogCommand;

final class FileSource extends AbstractSource
{
    public function __construct(
        protected string $filename
    ) {
    }

    public function createLog(CreateRequestLogCommand $command): void
    {
        if (!$this->isWriteable()) {
            $this->addContent('');
        }

        $this->addContent(
            json_encode($command->toArray()) . "\n"
        );
    }

    private function isWriteable(): bool
    {
        return is_writeable($this->filename);
    }

    private function addContent(string $content): void
    {
        $handle = fopen($this->filename, 'a');
        fwrite($handle, $content);
        fclose($handle);
    }
}

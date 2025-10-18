<?php

declare(strict_types=1);

namespace App\GofPatterns\Adapter\Infrastructure\Logging\Transport;

final readonly class ExternalFileLogger implements ExternalFileLoggerInterface
{
    public function __construct(private string $filePath)
    {
        $dir = \dirname($filePath);
        if (!is_dir($dir)) {
            mkdir(directory: $dir, recursive: true);
        }
    }

    public function writeLog(string $msg): void
    {
        file_put_contents(
            $this->filePath,
            date('[Y-m-d H:i:s] ').$msg.PHP_EOL,
            FILE_APPEND
        );
    }
}

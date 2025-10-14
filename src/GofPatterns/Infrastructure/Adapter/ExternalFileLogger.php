<?php

declare(strict_types=1);

namespace App\GofPatterns\Infrastructure\Adapter;

final readonly class ExternalFileLogger implements ExternalFileLoggerInterface
{
    public function __construct(private string $filePath)
    {
        if (!is_dir(dirname($filePath))) {
            mkdir(dirname($filePath), recursive: true);
        }
    }

    public function writeLog(string $msg): void
    {
        file_put_contents($this->filePath, date('[Y-m-d H:i:s] ').$msg.PHP_EOL, FILE_APPEND);
    }
}

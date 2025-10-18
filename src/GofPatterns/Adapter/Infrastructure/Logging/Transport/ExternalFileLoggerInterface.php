<?php

declare(strict_types=1);

namespace App\GofPatterns\Adapter\Infrastructure\Logging\Transport;

interface ExternalFileLoggerInterface
{
    public function writeLog(string $msg): void;
}

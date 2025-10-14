<?php

namespace App\GofPatterns\Infrastructure\Adapter;

interface ExternalFileLoggerInterface
{
    public function writeLog(string $msg): void;
}

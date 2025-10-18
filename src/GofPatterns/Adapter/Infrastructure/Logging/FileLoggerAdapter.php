<?php

declare(strict_types=1);

namespace App\GofPatterns\Adapter\Infrastructure\Logging;

use App\GofPatterns\Adapter\Infrastructure\Logging\Transport\ExternalFileLoggerInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

final readonly class FileLoggerAdapter implements LoggerInterface
{
    public function __construct(private ExternalFileLoggerInterface $logger)
    {
    }

    public function emergency(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }

    public function alert(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::ALERT, $message, $context);
    }

    public function critical(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::DEBUG, $message, $context);
    }

    public function error(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::ERROR, $message, $context);
    }

    public function warning(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::WARNING, $message, $context);
    }

    public function notice(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::NOTICE, $message, $context);
    }

    public function info(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::INFO, $message, $context);
    }

    public function debug(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::DEBUG, $message, $context);
    }

    public function log($level, \Stringable|string $message, array $context = []): void
    {
        $this->logger->writeLog($message);
    }
}

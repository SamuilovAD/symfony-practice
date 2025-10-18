<?php

declare(strict_types=1);

namespace App\GofPatterns\Singleton\Infrastructure;

final class AppConfig
{
    private static ?self $instance = null;
    public readonly bool $debug;
    public readonly string $environment;
    public readonly string $version;

    private function __construct(
        bool $debug = false,
        string $environment = 'prod',
        string $version = '1.0.0',
    ) {
        $this->debug = $debug;
        $this->environment = $environment;
        $this->version = $version;
    }

    public static function getInstance(): self
    {
        return self::$instance ??= new self();
    }

    public static function init(
        bool $debug = false,
        string $environment = 'prod',
        string $version = '1.0.0',
    ): self {
        if (null === self::$instance) {
            self::$instance = new self($debug, $environment, $version);
        }

        return self::$instance;
    }

    public function isDebug(): bool
    {
        return $this->debug;
    }

    public function getEnvironment(): string
    {
        return $this->environment;
    }

    public function getVersion(): string
    {
        return $this->version;
    }
}

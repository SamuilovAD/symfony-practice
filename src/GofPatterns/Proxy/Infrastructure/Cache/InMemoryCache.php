<?php

declare(strict_types=1);

namespace App\GofPatterns\Proxy\Infrastructure\Cache;

final class InMemoryCache
{
    /** @var array<string,mixed> */
    private array $store = [];

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->store);
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return $this->store[$key] ?? $default;
    }

    public function set(string $key, mixed $value): void
    {
        $this->store[$key] = $value;
    }
}

<?php

declare(strict_types=1);

namespace App\GofPatterns\Decorator\Infrastructure\Cache\InMemory;

use Psr\SimpleCache\CacheInterface;

final class TimedCache implements CacheInterface
{
    /** @var array<string, array{value:mixed, expiresAt:int}> */
    private array $storage = [];

    public function __construct(private readonly int $defaultTtlSeconds)
    {
    }

    public function get(string $key, mixed $default = null): mixed
    {
        $this->validateKey($key);
        $now = time();

        if (!isset($this->storage[$key])) {
            return $default;
        }

        $entry = $this->storage[$key];
        if ($entry['expiresAt'] < $now) {
            unset($this->storage[$key]);

            return $default;
        }

        return $entry['value'];
    }

    public function set(string $key, mixed $value, int|\DateInterval|null $ttl = null): bool
    {
        $this->validateKey($key);
        $seconds = $this->normalizeTtl($ttl);

        $this->storage[$key] = [
            'value' => $value,
            'expiresAt' => time() + $seconds,
        ];

        return true;
    }

    public function delete(string $key): bool
    {
        $this->validateKey($key);
        unset($this->storage[$key]);

        return true;
    }

    public function clear(): bool
    {
        $this->storage = [];

        return true;
    }

    public function getMultiple(iterable $keys, mixed $default = null): iterable
    {
        $result = [];
        foreach ($keys as $key) {
            $result[$key] = $this->get((string) $key, $default);
        }

        return $result;
    }

    /**
     * @param iterable<int|string, mixed> $values
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function setMultiple(iterable $values, int|\DateInterval|null $ttl = null): bool
    {
        foreach ($values as $key => $value) {
            $this->set((string) $key, $value, $ttl);
        }

        return true;
    }

    public function deleteMultiple(iterable $keys): bool
    {
        foreach ($keys as $key) {
            $this->delete((string) $key);
        }

        return true;
    }

    public function has(string $key): bool
    {
        $this->validateKey($key);
        $now = time();

        if (!isset($this->storage[$key])) {
            return false;
        }

        $entry = $this->storage[$key];
        if ($entry['expiresAt'] < $now) {
            unset($this->storage[$key]);

            return false;
        }

        return true;
    }

    private function validateKey(string $key): void
    {
        if (!preg_match('/^[A-Za-z0-9_.-]+$/', $key)) {
            throw new \InvalidArgumentException("Invalid cache key characters: {$key}");
        }
    }

    private function normalizeTtl(int|\DateInterval|null $ttl): int
    {
        if (null === $ttl) {
            return $this->defaultTtlSeconds;
        }
        if ($ttl instanceof \DateInterval) {
            return (new \DateTimeImmutable('@0'))->add($ttl)->getTimestamp();
        }

        return max(1, (int) $ttl);
    }
}

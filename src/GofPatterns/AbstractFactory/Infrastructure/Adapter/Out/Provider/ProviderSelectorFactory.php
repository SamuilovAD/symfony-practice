<?php

declare(strict_types=1);

namespace App\GofPatterns\AbstractFactory\Infrastructure\Adapter\Out\Provider;

use App\GofPatterns\AbstractFactory\Application\Exception\UndefinedProviderFactoryException;
use App\GofPatterns\AbstractFactory\Application\Port\Out\Factory\PaymentProviderFactoryInterface;
use App\GofPatterns\AbstractFactory\Application\Port\Out\Factory\ProviderSelectorFactoryInterface;
use App\GofPatterns\AbstractFactory\Domain\ValueObject\ProviderEnum;

final class ProviderSelectorFactory implements ProviderSelectorFactoryInterface
{
    /** @var array<string,PaymentProviderFactoryInterface> */
    private array $factories;

    /**
     * @param iterable<string, PaymentProviderFactoryInterface> $factories
     */
    public function __construct(iterable $factories)
    {
        $this->factories = $factories instanceof \Traversable ? iterator_to_array($factories) : $factories;
    }

    public function select(ProviderEnum $p): PaymentProviderFactoryInterface
    {
        if (!isset($this->factories[$p->value])) {
            throw new UndefinedProviderFactoryException();
        }

        return $this->factories[$p->value];
    }
}

<?php

declare(strict_types=1);

namespace App\GofPatterns\Infrastructure\AbstractFactory\Factory;

use App\GofPatterns\Domain\AbstractFactory\Factory\PaymentProviderFactoryInterface;
use App\GofPatterns\Domain\AbstractFactory\Provider;
use App\GofPatterns\Infrastructure\AbstractFactory\Exception\UndefinedProviderFactoryException;

final class ProviderSelectorFactory implements ProviderSelectorFactoryInterface
{
    /** @var array<string,PaymentProviderFactoryInterface> */
    private array $factories;

    public function __construct(iterable $factories)
    {
        $this->factories = $factories instanceof \Traversable ? iterator_to_array($factories) : $factories;
    }

    public function create(Provider $p): PaymentProviderFactoryInterface
    {
        if (!isset($this->factories[$p->value])) {
            throw new UndefinedProviderFactoryException();
        }

        return $this->factories[$p->value];
    }
}

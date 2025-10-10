<?php

namespace App\GofPatterns\Infrastructure\AbstractFactory\Factory;

use App\GofPatterns\Domain\AbstractFactory\Factory\PaymentProviderFactoryInterface;
use App\GofPatterns\Domain\AbstractFactory\Provider;

interface ProviderSelectorFactoryInterface
{
    public function create(Provider $p): PaymentProviderFactoryInterface;
}

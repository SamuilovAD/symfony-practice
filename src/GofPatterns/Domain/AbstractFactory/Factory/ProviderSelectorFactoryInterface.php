<?php

namespace App\GofPatterns\Domain\AbstractFactory\Factory;

use App\GofPatterns\Domain\AbstractFactory\Provider;

interface ProviderSelectorFactoryInterface
{
    public function create(Provider $p): PaymentProviderFactoryInterface;
}

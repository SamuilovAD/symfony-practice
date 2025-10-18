<?php

namespace App\GofPatterns\AbstractFactory\Application\Port\Out\Factory;

use App\GofPatterns\AbstractFactory\Domain\ValueObject\ProviderEnum;

interface ProviderSelectorFactoryInterface
{
    public function select(ProviderEnum $p): PaymentProviderFactoryInterface;
}

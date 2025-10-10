<?php

declare(strict_types=1);

namespace App\GofPatterns\Infrastructure\AbstractFactory\Paypal\Factory;

use App\GofPatterns\Domain\AbstractFactory\Factory\PaymentProviderFactoryInterface;
use App\GofPatterns\Domain\AbstractFactory\Service\ChargeServiceInterface;
use App\GofPatterns\Domain\AbstractFactory\Service\RefundServiceInterface;
use App\GofPatterns\Domain\AbstractFactory\Service\WebhookVerifierInterface;
use App\GofPatterns\Infrastructure\AbstractFactory\Paypal\Service\PaypalCharge;
use App\GofPatterns\Infrastructure\AbstractFactory\Paypal\Service\PaypalRefund;
use App\GofPatterns\Infrastructure\AbstractFactory\Paypal\Service\PaypalWebhookVerifier;

class PaypalProviderFactory implements PaymentProviderFactoryInterface
{
    public function createCharge(): ChargeServiceInterface
    {
        return new PaypalCharge();
    }

    public function createRefund(): RefundServiceInterface
    {
        return new PaypalRefund();
    }

    public function createWebhookVerifier(): WebhookVerifierInterface
    {
        return new PaypalWebhookVerifier();
    }
}

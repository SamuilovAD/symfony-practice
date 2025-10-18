<?php

declare(strict_types=1);

namespace App\GofPatterns\AbstractFactory\Infrastructure\Adapter\Out\Provider\Stripe;

use App\GofPatterns\AbstractFactory\Application\Port\Out\ChargeGatewayInterface;
use App\GofPatterns\AbstractFactory\Application\Port\Out\Factory\PaymentProviderFactoryInterface;
use App\GofPatterns\AbstractFactory\Application\Port\Out\RefundGatewayInterface;
use App\GofPatterns\AbstractFactory\Application\Port\Out\WebhookVerifierInterface;

class StripeProviderFactory implements PaymentProviderFactoryInterface
{
    public function createCharge(): ChargeGatewayInterface
    {
        return new StripeChargeGateway();
    }

    public function createRefund(): RefundGatewayInterface
    {
        return new StripeRefundGateway();
    }

    public function createWebhookVerifier(): WebhookVerifierInterface
    {
        return new StripeWebhookVerifier();
    }
}

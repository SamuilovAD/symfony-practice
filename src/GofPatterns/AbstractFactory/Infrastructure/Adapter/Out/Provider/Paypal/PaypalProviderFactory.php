<?php

declare(strict_types=1);

namespace App\GofPatterns\AbstractFactory\Infrastructure\Adapter\Out\Provider\Paypal;

use App\GofPatterns\AbstractFactory\Application\Port\Out\ChargeGatewayInterface;
use App\GofPatterns\AbstractFactory\Application\Port\Out\Factory\PaymentProviderFactoryInterface;
use App\GofPatterns\AbstractFactory\Application\Port\Out\RefundGatewayInterface;
use App\GofPatterns\AbstractFactory\Application\Port\Out\WebhookVerifierInterface;

class PaypalProviderFactory implements PaymentProviderFactoryInterface
{
    public function createCharge(): ChargeGatewayInterface
    {
        return new PaypalChargeGateway();
    }

    public function createRefund(): RefundGatewayInterface
    {
        return new PaypalRefundGateway();
    }

    public function createWebhookVerifier(): WebhookVerifierInterface
    {
        return new PaypalWebhookVerifier();
    }
}

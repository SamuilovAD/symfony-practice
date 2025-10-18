<?php

namespace App\GofPatterns\AbstractFactory\Application\UseCase;

use App\GofPatterns\AbstractFactory\Application\Port\Out\Factory\ProviderSelectorFactoryInterface;

final readonly class ChargePaymentHandler implements ChargePaymentHandlerInterface
{
    public function __construct(private ProviderSelectorFactoryInterface $providerFactory)
    {
    }

    public function __invoke(ChargePaymentInput $in): ChargePaymentResult
    {
        $adapters = $this->providerFactory->select($in->provider);
        $paymentId = $adapters->createCharge()->charge($in->orderId, $in->amountCents, $in->currency);

        return new ChargePaymentResult($paymentId);
    }
}

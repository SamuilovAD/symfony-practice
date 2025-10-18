<?php

namespace App\GofPatterns\AbstractFactory\Application\UseCase;

interface ChargePaymentHandlerInterface
{
    public function __invoke(ChargePaymentInput $in): ChargePaymentResult;
}

<?php

declare(strict_types=1);

namespace App\GofPatterns\Domain\Builder;

interface UrlBuilderInterface
{
    public function forCheckout(): self;

    public function forCustomerPortal(): self;

    public function withMode(string $mode): self;

    public function withSuccessUrl(string $url): self;

    public function withCancelUrl(string $url): self;

    public function withCustomerId(string $id): self;

    public function withSessionId(string $id): self;

    public function build(): string;
}

<?php

namespace App\GofPatterns\Infrastructure\Builder;

use App\GofPatterns\Domain\Builder\UrlBuilderInterface;

final class StripeUrlBuilder implements UrlBuilderInterface
{
    private string $baseUrl;
    private string $path = '/';
    private array $query = [];

    public function __construct(string $baseUrl = 'https://dashboard.stripe.com')
    {
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    public function forCheckout(): self
    {
        $this->path = '/checkout/session';

        return $this;
    }

    public function forCustomerPortal(): self
    {
        $this->path = '/portal/session';

        return $this;
    }

    public function withMode(string $mode): self
    {
        $this->query['mode'] = $mode;

        return $this;
    }

    public function withSuccessUrl(string $url): self
    {
        $this->query['success_url'] = $url;

        return $this;
    }

    public function withCancelUrl(string $url): self
    {
        $this->query['cancel_url'] = $url;

        return $this;
    }

    public function withCustomerId(string $id): self
    {
        $this->query['customer'] = $id;

        return $this;
    }

    public function withSessionId(string $id): self
    {
        $this->query['session_id'] = $id;

        return $this;
    }

    public function build(): string
    {
        $query = http_build_query($this->query);

        return sprintf('%s%s?%s', $this->baseUrl, $this->path, $query);
    }
}

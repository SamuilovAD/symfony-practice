<?php

declare(strict_types=1);

namespace App\GofPatterns\Facade\Application\UseCase\PlaceOrder;

use App\GofPatterns\Facade\Domain\Port\InventoryServiceInterface;
use App\GofPatterns\Facade\Domain\Port\NotificationServiceInterface;
use App\GofPatterns\Facade\Domain\Port\OrderRepositoryInterface;
use App\GofPatterns\Facade\Domain\Port\PaymentGatewayInterface;

final readonly class PlaceOrderFacadeHandler
{
    public function __construct(
        private PaymentGatewayInterface $payments,
        private InventoryServiceInterface $inventory,
        private NotificationServiceInterface $notifier,
        private OrderRepositoryInterface $orders,
    ) {
    }

    public function placeOrder(PlaceOrderRequest $request): PlaceOrderResult
    {
        if (!$this->inventory->checkAndReserve($request->items)) {
            $this->notifier->notify($request->userId, 'Order failed: items out of stock');

            return new PlaceOrderResult(false, message: 'Out of stock');
        }
        try {
            $tx = $this->payments->charge($request->totalAmountCents, $request->currency);
        } catch (\Throwable $e) {
            $this->inventory->release($request->items);
            $this->notifier->notify($request->userId, 'Order failed: payment declined');

            return new PlaceOrderResult(false, message: 'Payment failed');
        }

        $orderId = $this->orders->save(
            $request->userId,
            $request->items,
            $request->totalAmountCents,
            $request->currency,
            $tx
        );
        $this->notifier->notify($request->userId, sprintf('Order #%d placed successfully. TX=%s', $orderId, $tx));

        return new PlaceOrderResult(true, $orderId, $tx, 'Order placed');
    }
}

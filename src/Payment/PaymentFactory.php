<?php

namespace App\Payment;

use App\Payment\Stripe\StripePayment;

abstract class PaymentFactory
{
    public function __construct(
        private string $gateway
    )
    {
    }

    public function gateway(): StripePayment
    {
        return match ($this->gateway) {
            'stripe' => new StripePayment(),
            default => throw new \InvalidArgumentException('Unknown gateway'),
        };
    }
}
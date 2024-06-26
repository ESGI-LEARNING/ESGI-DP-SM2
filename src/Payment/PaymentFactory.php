<?php

namespace App\Payment;

use App\Payment\Paypal\PaypalPayment;
use App\Payment\Stripe\StripePayment;

abstract class PaymentFactory
{
    public function __construct(
        private string $gateway
    )
    {
    }

    public function createPayment(): StripePayment|PaypalPayment
    {
        return match ($this->gateway) {
            'stripe' => new StripePayment(),
            'paypal' => new PaypalPayment(),
            default => throw new \InvalidArgumentException('Unknown gateway'),
        };
    }
}
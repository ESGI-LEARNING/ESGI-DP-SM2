<?php

namespace App\Payment\Paypal;

use App\Payment\CreditCard\CreditCard;
use App\Payment\PaymentInterface;

class PaypalPayment implements PaymentInterface
{
    public function __construct()
    {
        // start connexion paypal
    }

    public function pay(float $mount, CreditCard $card, $transaction): void
    {
        // TODO: Implement pay() method.
    }

    public function createCustomer(): void
    {
        // TODO: Implement createCustomer() method.
    }
}
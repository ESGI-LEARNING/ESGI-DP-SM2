<?php

namespace App\Payment\Stripe;

use App\Payment\CreditCard\CreditCard;
use App\Payment\PaymentInterface;
use App\State\status\ErrorState;
use App\Transaction\Transaction;
use Stripe\StripeClient;

class StripePayment implements PaymentInterface
{
    private StripeClient $stripeClient;

    public function __construct()
    {
        $this->stripeClient = new StripeClient(
            $_ENV['STRIPE_SECRET']
        );
    }

    public function pay(float $mount, CreditCard $card, Transaction $transaction): void
    {
        try {

        } catch (\Exception $e) {
            $transaction->setState(new ErrorState());
            $transaction->handle($transaction);
        }
    }

    public function createCustomer(): void
    {
        // TODO: Implement createCustomer() method.
    }
}
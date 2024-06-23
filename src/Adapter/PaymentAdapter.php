<?php

namespace App\Adapter;

use App\Adapter\PaymentInterface;

class PaymentAdapter implements PaymentInterface
{
    private PaymentInterface $payment;

    public function __construct(PaymentInterface $payment)
    {
        $this->payment = $payment;
    }

    public function setCredentials(array $credentials): void
    {
        $this->payment->setCredentials($credentials);
    }

    public function pay(float $amount, string $currency, string $description): void
    {
        $this->payment->pay($amount, $currency, $description);
    }

    public function cancel(string $transactionId): void
    {
        $this->payment->cancel($transactionId);
    }
}
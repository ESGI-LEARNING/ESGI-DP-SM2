<?php

namespace App\Payment;

use App\Payment\CreditCard\CreditCard;
use App\Transaction\Transaction;

interface PaymentInterface
{
    public function pay(float $mount, CreditCard $card, Transaction $transaction): void;

    public function createCustomer(): void;
}
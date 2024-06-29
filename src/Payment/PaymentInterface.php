<?php

namespace App\Payment;

use App\Payment\CreditCard\CreditCard;
use App\Payment\Model\Customer;
use App\Transaction\Transaction;

interface PaymentInterface
{
    public function pay(float $mount, CreditCard $card, Transaction $transaction): void;

    public function cancelPayment(Transaction $transaction): void;

    public function createCustomer(Customer $customer): void;

    public function createCreditCard(CreditCard $card): void;
}
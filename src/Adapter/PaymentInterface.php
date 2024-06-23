<?php

namespace App\Adapter;

interface PaymentInterface
{
    public function setCredentials(array $credentials) : void;
    public function pay(float $amount, string $currency, string $description) : void;
    public function cancel(string $transactionId) : void;
}
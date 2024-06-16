<?php

namespace App\Adapter;

use App\Adapter\PaymentInterface;

class StripePayment implements PaymentInterface
{

    private $apiKey;

    public function setCredentials(array $credentials) : void
    {
        $this->apiKey = $credentials['api_key'];
    }

    public function pay(float $amount, string $currency, string $description) : void
    {
        // Implémentation spécifique à Stripe pour effectuer un paiement
    }

    public function cancel(string $transactionId) : void
    {
        // Implémentation spécifique à Stripe pour annuler une transaction
    }
}
<?php

namespace App\Adapter;

class PaymentManager
{
    private $payments;
    private $currentPayment;

    public function __construct()
    {
        $this->payments = [];
    }

    public function addPayment(PaymentInterface $payment) : void
    {
        $adapter = new PaymentAdapter($payment);
        $this->payments[$payment::class] = $adapter;
    }

    public function removePayment(string $paymentClass) : void
    {
        unset($this->payments[$paymentClass]);
    }

    public function selectPayment(string $paymentClass) : void
    {
        if (!isset($this->payments[$paymentClass])) {
            throw new \InvalidArgumentException("Payment class not supported.");
        }

        $this->currentPayment = $this->payments[$paymentClass];
    }

    public function initialize(array $credentials): void
    {
        $this->currentPayment->setCredentials($credentials);
    }

    public function createTransaction(float $amount, string $currency, string $description): void
    {
        // Création d'une transaction de paiement
    }

    public function executeTransaction(): void
    {
        // Exécution d'une transaction de paiement et récupération de son résultat
    }

    public function cancelTransaction(): void
    {
        // Annulation d'une transaction de paiement en cours
    }
}
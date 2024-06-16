<?php

use App\Adapter\PaymentManager;
use App\Adapter\StripePayment;

require 'vendor/autoload.php';

$manager = new PaymentManager();

$manager->addPayment(new StripePayment());
$manager->selectPayment(StripePayment::class);

$manager->initialize([
    'api_key' => 'sk_test_1234567890'
]);

$manager->createTransaction(100.0, 'EUR', 'Test transaction');
$result = $manager->executeTransaction();

if ($result->isSuccess()) {
    echo 'Paiement effectué avec succès';
} else {
    echo 'Échec du paiement';
}
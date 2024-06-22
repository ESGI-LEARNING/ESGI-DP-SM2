<?php

namespace App\Payement\CreditCard;

use InvalidArgumentException;

trait CreditCardValidatorTrait
{
    private function validateNumber(string $number): void
    {
        if (!preg_match('/^[0-9]{16}$/', $number)) {
            throw new InvalidArgumentException('Numéro de carte invalide');
        }
    }

    private function validateExpirationDate(string $expirationDate): void
    {
        if (!preg_match('/^(0[1-9]|1[0-2])\/[0-9]{2}$/', $expirationDate)) {
            throw new InvalidArgumentException('Date d\'expiration invalide');
        }
    }

    private function validateCvv(string $cvv): void
    {
        if (!preg_match('/^[0-9]{3,4}$/', $cvv)) {
            throw new InvalidArgumentException('CVV invalide');
        }
    }

    private function validateCardHolderName(string $cardHolderName): void
    {
        if (strlen($cardHolderName) < 2) {
            throw new InvalidArgumentException('Nom du titulaire de la carte invalide');
        }
    }
}
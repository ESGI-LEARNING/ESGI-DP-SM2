<?php

namespace App\Payment\CreditCard;

class CreditCard
{
    use CreditCardValidatorTrait;

    private string $number;

    private string $cvv;

    private string $expiry;

    private string $name;

    public function __construct(string $number, string $cvv, string $expiry, string $name)
    {
        $this->validateNumber($number);
        $this->validateExpirationDate($number);
        $this->validateCvv($number);
        $this->validateCardHolderName($number);

        $this->number = $number;
        $this->cvv = $cvv;
        $this->expiry = $expiry;
        $this->name = $name;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getCvv(): string
    {
        return $this->cvv;
    }

    public function getExpiry(): string
    {
        return $this->expiry;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
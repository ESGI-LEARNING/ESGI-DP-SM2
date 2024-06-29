<?php

namespace App\Payment\CreditCard;

class CreditCard
{
    use CreditCardValidatorTrait;

    private ?int $id = null;

    private string $number;

    private string $cvc;

    private string $expiry;

    private string $name;

    public function __construct(string $number, string $cvc, string $expiry, string $name)
    {
        $this->validateNumber($number);
        $this->validateExpirationDate($number);
        $this->validateCvv($number);
        $this->validateCardHolderName($number);

        $this->number = $number;
        $this->cvc = $cvc;
        $this->expiry = $expiry;
        $this->name = $name;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getCvc(): string
    {
        return $this->cvc;
    }

    public function getExpiry(): string
    {
        return $this->expiry;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): int
    {
        return $this->id ?: 0;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
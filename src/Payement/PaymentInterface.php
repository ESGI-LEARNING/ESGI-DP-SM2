<?php

namespace App\Payement;

interface PaymentInterface
{
    public function pay(float $mount, ): void;
}
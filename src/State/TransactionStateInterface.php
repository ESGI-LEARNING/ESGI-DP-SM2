<?php

namespace App\State;

use App\Transaction\Transaction;

interface TransactionStateInterface
{
    public function handle(Transaction $transaction): void;
}
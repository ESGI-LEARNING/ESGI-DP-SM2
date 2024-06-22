<?php

namespace App\State\status;

use App\State\TransactionStateInterface;
use App\Transaction\Transaction;

class ErrorState implements TransactionStateInterface
{
    public function handle(Transaction $transaction): void
    {
        echo "La transaction a échouée.\n";
    }
}
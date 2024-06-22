<?php

namespace App\State\status;

use App\State\TransactionStateInterface;
use App\Transaction\Transaction;

class CompletedState implements TransactionStateInterface
{
    public function handle(Transaction $transaction): void
    {
        echo "La transaction a été complétée avec succès.\n";
    }
}
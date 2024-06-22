<?php

namespace App\State\status;

use App\State\TransactionStateInterface;
use App\Transaction\Transaction;

class PendingState implements TransactionStateInterface
{
    public function handle(Transaction $transaction): void
    {
        echo "La transaction est en attente de paiement.\n";
        $transaction->setState(new ProcessingState());
    }
}
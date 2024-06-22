<?php

namespace App\State\status;

use App\State\TransactionStateInterface;
use App\Transaction\Transaction;

class ProcessingState implements TransactionStateInterface
{

    public function handle(Transaction $transaction): void
    {
        echo "La transaction est en cours de traitement.\n";
        $transaction->setState(new CompletedState());
    }
}
<?php

namespace App\State\status;

use App\State\TransactionStateInterface;
use App\Transaction\Transaction;

class DraftState implements TransactionStateInterface
{

    public function handle(Transaction $transaction): void
    {
        echo "La transaction est en cours de rédaction.\n";
        $transaction->setState(new PendingState());
    }
}
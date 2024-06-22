<?php

namespace App\Transaction;

use App\State\status\DraftState;
use App\State\TransactionStateInterface;

class Transaction
{
    /**
     * mode of transaction is either 'sandbox' or 'live'
     *
     * @var string $mode
     */
    private string $mode;

    private array $items;

    private string $device;

    private string $description;

    private string $success_url;

    private string $cancel_url;

    private TransactionStateInterface $state;

    public function __construct()
    {
        $this->state = new DraftState();
    }

    public function setItems(array $items): Transaction
    {
        $this->items = $items;

        return $this;
    }

    public function setDevice(string $device): Transaction
    {
        $this->device = $device;

        return $this;
    }

    public function setDescription(string $description): Transaction
    {
        $this->description = $description;

        return $this;
    }

    public function setMode(string $mode): Transaction
    {
        $this->mode = $mode;

        return $this;
    }

    public function setSuccessUrl(string $success_url): Transaction
    {
        $this->success_url = $success_url;

        return $this;
    }

    public function setCancelUrl(string $cancel_url): Transaction
    {
        $this->cancel_url = $cancel_url;

        return $this;
    }

    public function setState(TransactionStateInterface $state): void
    {
        $this->setState($state);
    }

    public function nextState(): void
    {
        $this->state->handle($this);
    }
}
<?php

namespace App\Payment\Stripe;

use App\Payment\CreditCard\CreditCard;
use App\Payment\Model\Customer;
use App\Payment\PaymentInterface;
use App\State\status\CompletedState;
use App\State\status\DraftState;
use App\State\status\ErrorState;
use App\Transaction\Transaction;
use Stripe\StripeClient;

class StripePayment implements PaymentInterface
{
    private StripeClient $stripeClient;

    public function __construct()
    {
        $this->stripeClient = new StripeClient(
            $_ENV['STRIPE_SECRET']
        );
    }

    public function pay(float $mount, CreditCard $card, Transaction $transaction): void
    {
        try {
            $this->stripeClient->paymentIntents->create([
                'amount' => $mount,
                'currency' => 'usd',
                'payment_method' => $card->getId(),
                'confirmation_method' => 'manual',
                'confirm' => true,
            ]);

            $transaction->setState(new CompletedState());
            $transaction->handle($transaction);
        } catch (\Exception $e) {
            $transaction->setState(new ErrorState());
            $transaction->handle($transaction);
        }
    }

    /**
     * @throws \Exception
     */
    public function createCustomer(Customer $customer): void
    {
        try {
            $this->stripeClient->customers->create([
                'name' => $customer->getName(),
                'email' => $customer->getEmail(),
                'phone' => $customer->getPhone(),
            ]);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @throws \Exception
     */
    public function cancelPayment(Transaction $transaction): void
    {
        try {
            $this->stripeClient->paymentIntents->cancel(
                $transaction->getId()
            );
        } catch (\Exception $e) {
            $transaction->setState(new DraftState());
            $transaction->handle($transaction);
        }
    }

    /**
     * @throws \Exception
     */
    public function createCreditCard(CreditCard $card): void
    {
        try {
            $this->stripeClient->paymentMethods->create([
                'type' => 'card',
                'card' => [
                    'number' => $card->getNumber(),
                    'exp_month' => $card->getExpiry(),
                    'exp_year' => $card->getExpiry(),
                    'cvc' => $card->getCvv(),
                ],
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
# Est une librairie pour manipulation de client de payement

## Utilisation Basique

1. Création d'un transaction

```php
// exemple de panier attendu

$panier = [
    [
        'name' => 'Produit 1',
        'price' => 1000,
        'quantity' => 1
    ],
    [
        'name' => 'Produit 2',
        'price' => 2000,
        'quantity' => 2
    ]
];

$transaction = new Transaction()
    ->setItems($panier)
    ->setMode('payment')
    ->setSuccessUrl('http://localhost/success')
    ->setCancelUrl('http://localhost/cancel')
    ->setDescription('Achat de produit')
    ->setDevise('FR');
```

2. Possibilité de créer un client

```php
$customer = new Customer()
$customer->setName('John Doe')
$customer->setEmail('john.doe@exemple.fr')
$customer->setPhone('0123456789')
$customer->setAddress('12 rue de la paix')
$customer->setCity('Paris')
$customer->setPostalCode('75000')
$customer->setCountry('France')
```

3. Possibilité de créer une carte de crédit  à l'utilisateur
```php
$creditCard = new CreditCard(
    '1234567890123456', // numéro de carte
    '12/2022', // date d'expiration
    '123', // cvc
    'John Doe' // nom du titulaire
);
```

4. Utilisation de la classe Payment
```php

// Lancer un payment avec stripe
$payment = new PaymentFactory('stripe');
$payment->gateway()->pay($transaction);

// Créer un client
$payment = new PaymentFactory('stripe');
$payment->gateway()->createCustomer($customer);

// Créer une carte de crédit
$payment = new PaymentFactory('stripe');
$payment->gateway()->createCreditCard($creditCard);
```

## Ajouter une nouvelle interface de paiement

1. Créer une nouvelle classe qui implémente l'interface `PaymentInterface`

ex: avec paypal

```php
class Paypal implements PaymentInterface
{
    public function pay(Transaction $transaction): string
    {
        // code pour payer avec paypal
    }

    public function cancelPayment(Transaction $transaction): string
    {
        // code pour anuller le payement en cours
    }

    public function createCustomer(Transaction $transaction): string
    {
        // code pour créer un client
    }

    public function createCreditCard(Transaction $transaction): string
    {
        // code pour créer une carte de crédit
    }
}
```

2. Ajouter la nouvelle classe dans le fichier `PaymentFactory.php`

```php

public function createPayment(): StripePayment
{
    return match ($this->gateway) {
        'stripe' => new StripePayment(),
        'paypal' => new PaypalPayment(), 
        default => throw new \InvalidArgumentException('Unknown gateway'),
    };
}
```

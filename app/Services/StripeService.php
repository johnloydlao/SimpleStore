<?php

namespace App\Services;

use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripeService
{
    public function createCheckoutSession($cart)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $lineItems = $this->prepareLineItems($cart);

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);

        return $session;
    }

    private function prepareLineItems($cart)
    {
        $lineItems = [];

        foreach ($cart->products as $product) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->name,
                    ],
                    'unit_amount' => $product->price * 100,
                ],
                'quantity' => $product->pivot->quantity,
            ];
        }

        return $lineItems;
    }
}

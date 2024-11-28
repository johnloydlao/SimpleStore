<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StripeService;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    protected $stripeService;

    public function __construct(StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
    }

    public function checkout()
    {
        $cart = auth()->user()->cart;

        try {
            $session = $this->stripeService->createCheckoutSession($cart);
            return redirect($session->url);
        } catch (\Exception $e) {
            Log::error('Checkout error: ' . $e->getMessage());

            return redirect()->route('checkout.cancel')->with('error', $e->getMessage());
        }
    }

    public function checkoutSuccess()
    {
        $cart = auth()->user()->cart;

        if ($cart) {
            $cart->products()->detach();
            $cart->delete();
        }
        return view('checkout.success');
    }

    public function checkoutCancel()
    {
        return view('checkout.cancel');
    }
}

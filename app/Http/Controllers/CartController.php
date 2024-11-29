<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Services\StripeService;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = Auth::user();

        $cart = $user->cart?->first();
        if (!$cart) {
            $cart = Cart::create([
                'user_id' => $user->id,
            ]);
        }

        $productInCart = $cart->products()->where('product_id', $request->product_id)->first();

        if ($productInCart) {
            $newQuantity = $productInCart->pivot->quantity + $request->quantity;
            $cart->products()->updateExistingPivot($request->product_id, ['quantity' => $newQuantity]);
        } else {
            $cart->products()->attach($request->product_id, ['quantity' => $request->quantity]);
        }

        session()->flash('success', 'Product added to cart.');

        return redirect()->route('products.index');
    }

    public function view()
    {
        $user = auth()->user();

        $cart = $user->cart?->first() ?? null;
        $cartItems = $cart?->products ?? [];

        return view('cart.view', compact('cart', 'cartItems'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = Auth::user();

        $cart = $user->carts->first();
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

    /**
     * Display the specified resource.
     */
    public function view()
    {
        $user = auth()->user();

        $cart = $user->carts->first();
        $cartItems = $cart ? $cart->products : [];

        return view('cart.view', compact('cart', 'cartItems'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
     public function show()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to checkout');
        }

        $cartItems = Auth::user()->cartItems()->with('painting')->get();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty');
        }
        
        $subtotal = $cartItems->sum(function($item) {
            return $item->painting->price * $item->quantity;
        });
        
        $shipping = $subtotal > 0 ? 10 : 0;
        $total = $subtotal + $shipping;
        
        return view('cart.checkout', compact('cartItems', 'subtotal', 'shipping', 'total'));
    }
}

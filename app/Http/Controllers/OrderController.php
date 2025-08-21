<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function place(Request $request)
{
    $user = Auth::user();
    $cartItems = $user->cartItems()->with('painting')->get();

    if ($cartItems->isEmpty()) {
        return redirect()->route('cart.view')->with('error', 'Your cart is empty');
    }

    $subtotal = $cartItems->sum(fn($item) => $item->painting->price * $item->quantity);
    $shipping = 10;
    $total = $subtotal + $shipping;

    // Order create
    $order = Order::create([
        'user_id' => $user->id,
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'address' => $request->address,
        'city' => $request->city,
        'state' => $request->state,
        'zip_code' => $request->zip_code,
        'phone' => $request->phone,
        'artwork_id' => $artwork->id,
        'payment_method' => $request->payment_method,
        'subtotal' => $subtotal,
        'shipping' => $shipping,
        'total' => $total,
        'total_amount' => $total,  // 👈 yahan add karo
        'status' => 'pending',
    ]);

    // Order items
    foreach ($cartItems as $item) {
        $order->items()->create([
              'artwork_id' => $item['artwork_id'],
            'quantity' => $item->quantity,
            'price' => $item->painting->price,
        ]);
    }

    // Clear cart
    $user->cartItems()->delete();

    return redirect()->route('orders.history')->with('success', 'Order placed successfully!');
}

    
    public function history()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to view your orders');
        }

        $orders = Auth::user()->orders()->with('items.painting')->latest()->get();
        
        return view('cart.orders', compact('orders'));
    }
    
}

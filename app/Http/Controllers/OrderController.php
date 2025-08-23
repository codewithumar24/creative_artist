<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

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

        // Create order with pending status
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
            'payment_method' => 'stripe',
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'total' => $total,
            'total_amount' => $total,
            'status' => 'pending',
            'stripe_payment_intent_id' => null, // Will be set after payment
        ]);

        // Order items
        foreach ($cartItems as $item) {
            $order->items()->create([
                'artwork_id' => $item->painting->id,
                'quantity' => $item->quantity,
                'price' => $item->painting->price,
            ]);
        }

        // If payment method is stripe, create a checkout session
        if ($request->payment_method === 'stripe') {
            return $this->handleStripePayment($order, $user);
        }

        // For other payment methods (if any)
        // Clear cart
        $user->cartItems()->delete();

        return redirect()->route('orders.history')->with('success', 'Order placed successfully!');
    }

    private function handleStripePayment($order, $user)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $lineItems = [];
            foreach ($order->items as $item) {
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $item->painting->title,
                        ],
                        'unit_amount' => $item->price * 100, // Convert to cents
                    ],
                    'quantity' => $item->quantity,
                ];
            }

            // Add shipping as a separate line item
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Shipping Fee',
                    ],
                    'unit_amount' => $order->shipping * 100,
                ],
                'quantity' => 1,
            ];

            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}&order_id=' . $order->id,
                'cancel_url' => route('stripe.cancel') . '?order_id=' . $order->id,
                'customer_email' => $user->email,
                'metadata' => [
                    'order_id' => $order->id,
                    'user_id' => $user->id
                ],
            ]);

            // Update order with session ID
            $order->update(['stripe_session_id' => $session->id]);

            // Redirect to Stripe Checkout
            return redirect()->away($session->url);
        } catch (ApiErrorException $e) {
            // Handle error
            return redirect()->back()->with('error', 'Error processing payment: ' . $e->getMessage());
        }
    }

    public function stripeSuccess(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
           $session = \Stripe\Checkout\Session::retrieve($request->session_id);
            $order = Order::find($request->order_id);

            if ($session->payment_status === 'paid') {
                // Update order status
                $order->update([
                    'status' => 'completed',
                    'stripe_payment_intent_id' => $session->payment_intent
                ]);

                // Clear cart
                Auth::user()->cartItems()->delete();

                return redirect()->route('orders.history')->with('success', 'Payment successful! Order completed.');
            }

            return redirect()->route('orders.history')->with('error', 'Payment not completed.');
        } catch (ApiErrorException $e) {
            return redirect()->route('orders.history')->with('error', 'Error verifying payment: ' . $e->getMessage());
        }
    }

    public function stripeCancel(Request $request)
    {
        $order = Order::find($request->order_id);

        // You might want to delete the order or keep it as failed
        $order->update(['status' => 'cancelled']);

        return redirect()->route('cart.view')->with('error', 'Payment was cancelled.');
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

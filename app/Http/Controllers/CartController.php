<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
//     public function add($id)
// 
//     $painting = Artwork::findOrFail($id);

//     $cart = session()->get('cart', []);

//     if(isset($cart[$id])) {
//         $cart[$id]['quantity']++;
//     } else {
//         $cart[$id] = [
//             "title" => $painting->title,
//             "price" => $painting->price,
//             "image" => $painting->image,
//             "quantity" => 1
//         ];
//     }

//     session()->put('cart', $cart);

//     return redirect()->back()->with('success', 'Painting added to cart!');
// }



public function add($id, Request $request)
{
    $request->validate([
        'quantity' => 'required|integer|min:1'
    ]);

    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please login to add items to cart');
    }

    $painting = Artwork::findOrFail($id);

    $existingItem = CartItem::where('user_id', Auth::id())
        ->where('artwork_id', $painting->id)
        ->first();

    if ($existingItem) {
        $existingItem->quantity += $request->quantity;
        $existingItem->save();
    } else {
        CartItem::create([
            'user_id'    => Auth::id(),
            'artwork_id' => $painting->id,
            'quantity'   => $request->quantity
        ]);
    }

    return redirect()->route('cart.view')->with('success', 'Item added to cart successfully');
}

    
    public function view()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to view your cart');
        }

        $cartItems = Auth::user()->cartItems()->with('painting.user')->get();
        $subtotal = $cartItems->sum(function($item) {
            return $item->painting->price * $item->quantity;
        });
        
        $shipping = $subtotal > 0 ? 10 : 0; // Example shipping calculation
        $total = $subtotal + $shipping;
        
        return view('cart.cart', compact('cartItems', 'subtotal', 'shipping', 'total'));
    }
    
    public function update(CartItem $cartItem, Request $request)
    {
        // Authorization - ensure user owns this cart item
        if ($cartItem->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);
        
        $cartItem->quantity = $request->quantity;
        $cartItem->save();
        
        return redirect()->route('cart.view')
            ->with('success', 'Cart updated successfully');
    }
    
    public function remove(CartItem $cartItem)
    {
        // Authorization - ensure user owns this cart item
        if ($cartItem->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $cartItem->delete();
        
        return redirect()->route('cart.view')
            ->with('success', 'Item removed from cart');
    }

    public function count()
    {
        $count = Auth::check() ? Auth::user()->cartItems()->count() : 0;
        
        return response()->json(['count' => $count]);
    }


}
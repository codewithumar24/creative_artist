@extends('layouts.homeLayout')

@section('homeMain')
<div class="container py-5 mt-5">
    <h2 class="section-title mb-4">Your Shopping Cart</h2>
    <h2 class="section-title mb-4 ms-5">
    <span class="badge bg-primary">
        {{ $cartItems->sum('quantity') }} Products
    </span>
</h2>
    @if(count($cartItems) > 0)
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    @foreach($cartItems as $item)
                    <div class="row align-items-center mb-4 pb-4 border-bottom">
                        <div class="col-md-3">
                            <img src="{{ asset('storage/' . $item->painting->image) }}" 
                                 alt="{{ $item->painting->title }}" 
                                 class="img-fluid rounded">
                        </div>
                        <div class="col-md-5">
                            <h5>{{ $item->painting->title }}</h5>
                            <p class="text-muted mb-1">By {{ $item->painting->user->name }}</p>
                            <p class="text-primary fw-bold">${{ number_format($item->painting->price, 2) }}</p>
                        </div>
                        <div class="col-md-2">
                            <form action="{{ route('cart.update', $item->id) }}" method="POST" class="update-quantity-form">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $item->quantity }}" 
                                       min="1" class="form-control form-control-sm">
                            </form>
                        </div>
                        <div class="col-md-2 text-end">
                            <p class="fw-bold">${{ number_format($item->painting->price * $item->quantity, 2) }}</p>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Order Summary</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal</span>
                        <span>${{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Shipping</span>
                        <span>${{ number_format($shipping, 2) }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <strong>Total</strong>
                        <strong>${{ number_format($total, 2) }}</strong>
                    </div>
                    <a href="{{ route('checkout') }}" class="btn btn-primary w-100">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="text-center py-5">
        <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
        <h4>Your cart is empty</h4>
        <p class="text-muted">Browse our collection to find artwork you love</p>
        <a href="{{ route('home.gallery') }}" class="btn btn-primary">Continue Shopping</a>
    </div>
    @endif
</div>

<script>
// Auto update quantity when changed
document.querySelectorAll('.update-quantity-form input').forEach(input => {
    input.addEventListener('change', function() {
        this.form.submit();
    });
});
</script>
@endsection
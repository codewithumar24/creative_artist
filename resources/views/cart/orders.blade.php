@extends('layouts.homeLayout')

@section('homeMain')
<div class="container py-5 mt-5">
    <h2 class="section-title mb-4">Your Orders</h2>
    
    @if(count($orders) > 0)
    <div class="accordion" id="ordersAccordion">
        @foreach($orders as $order)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $order->id }}">
                <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" 
                        type="button" data-bs-toggle="collapse" 
                        data-bs-target="#collapse{{ $order->id }}" 
                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}" 
                        aria-controls="collapse{{ $order->id }}">
                    <div class="d-flex justify-content-between w-100 me-3">
                        <div>
                            <span class="fw-bold">Order #{{ $order->id }}</span>
                            <span class="ms-3 text-muted">{{ $order->created_at->format('M d, Y') }}</span>
                        </div>
                        <div>
                            <span class="badge bg-{{ $order->status == 'completed' ? 'success' : 'warning' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                    </div>
                </button>
            </h2>
            <div id="collapse{{ $order->id }}" 
                 class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" 
                 aria-labelledby="heading{{ $order->id }}" 
                 data-bs-parent="#ordersAccordion">
                <div class="accordion-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6>Shipping Address</h6>
                            <p>
                                {{ $order->first_name }} {{ $order->last_name }}<br>
                                {{ $order->address }}<br>
                                {{ $order->city }}, {{ $order->state }} {{ $order->zip_code }}<br>
                                {{ $order->phone }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6>Payment Method</h6>
                            <p class="text-capitalize">{{ str_replace('_', ' ', $order->payment_method) }}</p>
                            
                            <h6>Order Total</h6>
                            <p class="fw-bold">${{ number_format($order->total_amount, 2) }}</p>
                        </div>
                    </div>
                    
                    <h6>Order Items</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/' . optional($item->painting)->image) }}"
     alt="{{ optional($item->painting)->title }}"
     class="img-thumbnail me-2" 
     style="width: 50px; height: 50px; object-fit: cover;">
                                            <div>{{ $item->painting->title }}</div>
                                        </div>
                                    </td>
                                    <td>${{ number_format($item->price, 2) }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-5">
        <i class="fas fa-receipt fa-3x text-muted mb-3"></i>
        <h4>You haven't placed any orders yet</h4>
        <p class="text-muted">Start shopping to see your orders here</p>
        <a href="#" class="btn btn-primary">Start Shopping</a>
    </div>
    @endif
</div>
@endsection
@extends('dashboard.dashboardLayout')

@section('dashboardMain')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <div class="artwork-detail-img">
                <img src="{{ asset('storage/'.$artwork->image) }}" alt="{{ $artwork->title }}" class="img-fluid rounded">
            </div>
        </div>
        <div class="col-md-6">
            <h1 class="display-4">{{ $artwork->title }}</h1>
            <p class="text-muted">by {{ $artwork->artist_name }}</p>
            
            <div class="price-section mb-4">
                <h2 class="text-primary">Rs. {{ number_format($artwork->price) }}</h2>
            </div>

            <div class="description-section mb-4">
                <h4>Description</h4>
                <p class="lead">{{ $artwork->description }}</p>
            </div>

            <div class="details-section mb-4">
                <div class="row">
                    <div class="col-6">
                        <strong>Medium:</strong> {{ $artwork->medium }}
                    </div>
                    <div class="col-6">
                        <strong>Category:</strong> {{ $artwork->category->name }}
                    </div>
                </div>
            </div>

            <div class="action-buttons">
                <button class="btn btn-primary btn-lg add-to-cart-single" data-artwork-id="{{ $artwork->id }}">
                    <i class="bi bi-cart-plus me-2"></i> Add to Cart
                </button>
                <a href="{{ route('artwork.index') }}" class="btn btn-outline-secondary btn-lg ms-2">
                    <i class="bi bi-arrow-left me-2"></i> Continue Shopping
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Add to cart functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Single page add to cart
        document.querySelector('.add-to-cart-single')?.addEventListener('click', function() {
            addToCart(this.dataset.artworkId);
        });
    });

    function addToCart(artworkId) {
        fetch('{{ route("cart.add") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                artwork_id: artworkId,
                quantity: 1
            })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                // Update cart count
                updateCartCount(data.cart_count);
                
                // Show success message
                alert('Artwork added to cart successfully!');
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function updateCartCount(count) {
        const cartCountElements = document.querySelectorAll('.cart-count');
        cartCountElements.forEach(el => {
            el.textContent = count;
            el.classList.remove('d-none');
        });
    }
</script>
@endpush
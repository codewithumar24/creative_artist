@extends('layouts.homeLayout')

@section('homeMain')
<div class="container py-5 mt-5">
    <div class="row g-5 align-items-center">
        <!-- Painting Image -->
        <div class="col-lg-6">
            <div class="artwork-img-container rounded shadow-lg overflow-hidden">
                <img src="{{ asset('storage/' . $painting->image) }}" 
                     class="artwork-img w-100" 
                     alt="{{ $painting->title }}">
            </div>
        </div>

        <!-- Painting Details -->
        <div class="col-lg-6">
            <h2 class="section-title mb-3">{{ $painting->title }}</h2>

            <!-- Artist Info -->
<div class="d-flex align-items-center mb-4">
    <div class="artist-avatar-container">
        <img src="{{ $painting->user && $painting->user->avatar 
                                              ? asset('storage/avatars/' . $painting->user->avatar) 
                                              : asset('images/default-avatar.png') }}" 
             alt="{{ $painting->user->name ?? 'Unknown Artist' }}" 
             class="artist-avatar">
    </div>
    <div class="ms-3">
        <h6 class="mb-0">{{ $painting->user->name ?? 'Unknown Artist' }}</h6>
        <small class="text-muted">Artist</small>
    </div>
</div>

            <!-- Price -->
            <h4 class="text-primary fw-bold mb-3">${{ number_format($painting->price, 2) }}</h4>

            <!-- Description -->
            <p class="text-muted mb-4">{{ $painting->description }}</p>

            <!-- Add to Cart -->
            <form action="{{ route('cart.add', $painting->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" name="quantity" id="quantity" value="1" min="1" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary btn-lg">
        <i class="fas fa-shopping-cart me-2"></i> Add to Cart
    </button>
</form>

        </div>
    </div>

    <!-- Extra Section: Related Artworks -->
    <div class="mt-5">
        <h3 class="section-title">You May Also Like</h3>
        <div class="row">
            @foreach($relatedPaintings as $related)
                <div class="col-md-4">
                    <div class="artwork-card">
                        <div class="artwork-img-container">
                            <img src="{{ asset('storage/' . $related->image) }}" 
                                 class="artwork-img" 
                                 alt="{{ $related->title }}">
                        </div>
                        <div class="artwork-info">
                            <h4>{{ $related->title }}</h4>
                            <p>${{ number_format($related->price, 2) }}</p>
                            <a href="{{ route('painting.detail', $related->id) }}" class="btn btn-sm btn-outline-primary">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

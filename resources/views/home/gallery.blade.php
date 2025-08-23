@extends("layouts.homeLayout")
@section("homeMain")
    <div id="gallery-page">
        <section class="py-5 bg-light">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="section-title">Artwork Gallery</h2>
                        <p class="lead">Browse and discover amazing artwork from our community.</p>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <ul class="nav filter-nav justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" data-filter="all">All</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-filter="painting">Painting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-filter="digital">Digital Art</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-filter="photography">Photography</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-filter="sculpture">Sculpture</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-filter="illustration">Illustration</a>
                            </li>
                        </ul>
                    </div>
                </div>
 <div class="row mt-5 gallery-items">
    @foreach ($artworks as $artwork)
        <div class="col-md-6 col-lg-4 mb-4 animate-on-scroll" data-category="{{ strtolower($artwork->category->name) }}">
    <div class="artwork-card">
        <a href="{{ route("painting.detail", $artwork->id) }}" class="text-decoration-none">
            <div class="artwork-img-container">
                <img src="{{ asset('storage/'.$artwork->image) }}" alt="{{ $artwork->title }}" class="artwork-img">
            </div>
        </a>
        <div class="artwork-info">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <h4 class="mb-0">
                    <a href="{{ route('artwork.show', $artwork->id) }}" class="text-decoration-none text-dark">
                        {{ $artwork->title }}
                    </a>
                </h4>
                <span class="text-primary fw-bold">${{ number_format($artwork->price) }}</span>
            </div>
            <p class="text-muted">{{ Str::limit($artwork->description, 100) }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <a href="artist-profile.html" class="text-decoration-none artist-link">
                    <div class="d-flex align-items-center">
                        <div class="artist-avatar-container">
                            <img src="{{ $artwork->user && $artwork->user->avatar 
                                        ? asset('storage/' . $artwork->user->avatar) 
                                        : asset('images/default-avatar.png') }}"
                                 alt="{{ $artwork->artist_name }}" 
                                 class="artist-avatar">
                        </div>
                        <span class="artist-name">{{ $artwork->artist_name }}</span>
                    </div>
                </a>
                <span class="badge bg-primary">{{ $artwork->category->name }}</span>
            </div>
            <div class="mt-3">
                <button class="btn btn-primary btn-sm add-to-cart" data-artwork-id="{{ $artwork->id }}">
                    <i class="bi bi-cart-plus me-1"></i> Add to Cart
                </button>
            </div>
        </div>
    </div>
</div>
    @endforeach
</div>                
                <div class="text-center mt-4">
                    <button class="btn btn-primary" id="load-more">Load More</button>
                </div>
            </div>
        </section>
    </div>
@endsection
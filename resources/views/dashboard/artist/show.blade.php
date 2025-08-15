@extends('dashboard.dashboardLayout')

@section('mainDashboard')
<div class="main-content">
    <div class="header">
        <div class="header-left">
            <h5 class="mb-0">
                <a href="{{ route('artist.index') }}" class="text-dark">
                    <i class="bi bi-arrow-left me-2"></i> Back to Artists
                </a>
            </h5>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <!-- Artist Profile Column -->
            <div class="col-md-4">
                <div class="card dashboard-card mb-4">
                    <div class="card-body text-center">
                        <img src="{{ $artist->getAvatarUrl() }}" 
                             class="rounded-circle mb-3" 
                             width="150" 
                             height="150" 
                             alt="{{ $artist->name }}">
                        
                        <h3>{{ $artist->name }}</h3>
                        <p class="text-muted mb-1">{{ $artist->specialty }}</p>
                        <p class="text-muted"><i class="bi bi-geo-alt"></i> {{ $artist->location }}</p>
                        
                        <div class="d-flex justify-content-center gap-3 mb-3">
                            @if($artist->instagram)
                            <a href="{{ $artist->instagram }}" target="_blank" class="text-dark">
                                <i class="bi bi-instagram fs-4"></i>
                            </a>
                            @endif
                            
                            @if($artist->twitter)
                            <a href="{{ $artist->twitter }}" target="_blank" class="text-dark">
                                <i class="bi bi-twitter-x fs-4"></i>
                            </a>
                            @endif
                            
                            @if($artist->website)
                            <a href="{{ $artist->website }}" target="_blank" class="text-dark">
                                <i class="bi bi-globe fs-4"></i>
                            </a>
                            @endif
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <a href="{{ route('artist.edit', $artist->id) }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('artist.destroy', $artist->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Delete this artist?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- About Card -->
                <div class="card dashboard-card">
                    <div class="card-body">
                        <h5 class="card-title">About</h5>
                        <p class="card-text">{{ $artist->bio ?? 'No bio available' }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Artist Artworks Column -->
            <div class="col-md-8">
                <div class="card dashboard-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="mb-0">Recent Artworks</h5>
                            <a href="{{ route('artwork.create', ['artist_id' => $artist->id]) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-plus-lg"></i> Add Artwork
                            </a>
                        </div>
                        
                        @if($artist->artworks->count() > 0)
                            <div class="row">
                                @foreach($artist->artworks as $artwork)
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100">
                                        <img src="{{ asset('storage/' . $artwork->image) }}" 
                                             class="card-img-top" 
                                             alt="{{ $artwork->title }}"
                                             style="height: 200px; object-fit: cover;">
                                        <div class="card-body">
                                            <h6 class="card-title">{{ $artwork->title }}</h6>
                                            <p class="card-text text-muted small">{{ $artwork->medium }}</p>
                                        </div>
                                        <div class="card-footer bg-transparent">
                                            <a href="{{ route('artwork.show', $artwork->id) }}" class="btn btn-outline-primary btn-sm">
                                                View Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="bi bi-brush display-6 text-muted"></i>
                                <h5 class="mt-3">No Artworks Yet</h5>
                                <p class="text-muted">This artist hasn't added any artworks yet</p>
                                <a href="{{ route('artwork.create', ['artist_id' => $artist->id]) }}" class="btn btn-primary mt-2">
                                    <i class="bi bi-plus-lg me-1"></i> Add First Artwork
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .dashboard-card {
        border-radius: 10px;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
    .card-img-top {
        border-radius: 8px 8px 0 0;
    }
    .social-icon {
        transition: transform 0.2s;
    }
    .social-icon:hover {
        transform: scale(1.2);
    }
</style>
@endpush
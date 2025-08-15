@extends('dashboard.dashboardLayout')

@section('mainDashboard')
<div class="main-content">
    <div class="header">
        <div class="header-left">
            <h5 class="mb-0">
                <a href="{{ route('artwork.index') }}" class="text-dark">
                    <i class="bi bi-arrow-left me-2"></i> Back to Artworks
                </a>
            </h5>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card dashboard-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="artwork-image-container mb-4">
                                    <img src="{{ asset('storage/' . $artwork->image) }}" 
                                         alt="{{ $artwork->title }}" 
                                         class="img-fluid rounded">
                                </div>
                                
                                @if($artwork->artist_image)
                                <div class="artist-image-container mt-4">
                                    <h6>Artist Photo</h6>
                                    <img src="{{ asset('storage/' . $artwork->artist_image) }}" 
                                         alt="{{ $artwork->artist_name }}" 
                                         class="img-thumbnail" style="max-width: 200px;">
                                </div>
                                @endif
                            </div>
                            
                            <!-- Artwork Info -->
                            <div class="col-md-6">
                                <h2 class="mb-3">{{ $artwork->title }}</h2>
                                
                                <div class="mb-4">
                                    <h5 class="text-muted">{{ $artwork->artist_name }}</h5>
                                    <span class="badge bg-primary">{{ $artwork->category->name ?? 'Uncategorized' }}</span>
                                </div>
                                
                                <div class="mb-4">
                                    <h6>Medium</h6>
                                    <p>{{ $artwork->medium }}</p>
                                </div>
                                
                                <div class="mb-4">
                                    <h6>Description</h6>
                                    <p>{{ $artwork->description }}</p>
                                </div>
                                
                                <div class="d-flex justify-content-between pt-3 border-top">
                                    <small class="text-muted">Created: {{ $artwork->created_at->format('M d, Y') }}</small>
                                    <div class="btn-group">
                                        <a href="{{ route('artwork.edit', $artwork->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('artwork.destroy', $artwork->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .artwork-image-container {
        border: 1px solid #eee;
        padding: 10px;
        background: white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .artwork-image-container img {
        max-height: 500px;
        width: 100%;
        object-fit: contain;
    }
    .artist-image-container {
        padding: 10px;
        background: #f8f9fa;
        border-radius: 5px;
    }
</style>
@endpush
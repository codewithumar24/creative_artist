@extends('dashboard.dashboardLayout')

@section('mainDashboard')
<div class="main-content">
    <div class="header">
        <div class="header-left">
            <h5 class="mb-0"><i class="bi bi-brush me-2"></i> Artwork Collection</h5>
        </div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        <i class="bi bi-exclamation-triangle me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

        <div class="header-right">
            <a href="{{ route("artwork.create") }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg me-1"></i> Add Artwork
            </a>
        </div>
    </div>

    <div class="container-fluid py-4">
        <!-- Error Message Placeholder -->
        <div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="errorAlert">
            <i class="bi bi-exclamation-triangle me-2"></i>
            <span id="errorMessage">Sample error message would appear here</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <!-- Success Message Placeholder -->
        <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="successAlert">
            <i class="bi bi-check-circle me-2"></i>
            <span id="successMessage">Sample success message would appear here</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <div class="card dashboard-card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table data-table">
                        <thead class="table-light">
                            <tr>
                                <th width="60">#</th>
                                <th>Artwork</th>
                                <th>Artist</th>
                                <th>Medium</th>
                                <th>Category</th>
                                <th width="120" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($artworks as $artwork)
                                <tr>
                                <td>{{$artwork->id}}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $artwork->user->avatar) }}" 
                                             class="artwork-thumb me-3" width="40" hight="40"
                                             alt="Starry Night">
                                             
                                        <div>
                                            <strong>{{$artwork->title}}</strong>
                                            <div class="text-muted small">{{$artwork->description}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $artwork->image) }}" 
                                             class="rounded-circle me-2" 
                                             width="40" 
                                             height="40"
                                             alt="Van Gogh">
                                        <span>{{$artwork->artist_name}}</span>
                                    </div>
                                </td>
                                <td>{{$artwork->medium}}</td>
                                <td>{{$artwork->category->name}}</td>
                                <td class="text-end">
                                    <div class="btn-group btn-group-sm">

                                   <a href="{{ route('artwork.show', $artwork->id) }}" class="btn btn-outline-primary">
        <i class="bi bi-eye"></i>
    </a>      
                                        {{-- <button class="btn btn-outline-primary">
                                            <i class="bi bi-eye"></i>
                                        </button> --}}
                                        <a class="btn btn-outline-success" href="{{ route("artwork.edit",$artwork->id) }}"> <i class="bi bi-pencil"></i></a>
                                        <a class="btn btn-outline-danger" href="{{ route("artwork.destroy",$artwork->id) }}"> <i class="bi bi-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Placeholder -->
                <nav aria-label="Page navigation" class="mt-4">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .artwork-thumb {
        width: 80px;
        height: 60px;
        object-fit: cover;
        border-radius: 4px;
    }
    .data-table th {
        background-color: #f8f9fa;
        font-weight: 600;
    }
    .data-table td, .data-table th {
        vertical-align: middle;
    }
    .btn-group-sm > .btn {
        padding: 0.25rem 0.5rem;
    }
</style>
@endpush

@push('scripts')
<script>
    function showError(message) {
        document.getElementById('errorMessage').textContent = message;
        document.getElementById('errorAlert').classList.remove('d-none');
        setTimeout(() => {
            document.getElementById('errorAlert').classList.add('d-none');
        }, 5000);
    }

    function showSuccess(message) {
        document.getElementById('successMessage').textContent = message;
        document.getElementById('successAlert').classList.remove('d-none');
        setTimeout(() => {
            document.getElementById('successAlert').classList.add('d-none');
        }, 5000);
    }
</script>
@endpush
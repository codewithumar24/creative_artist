<!-- resources/views/dashboard/artists/index.blade.php -->
@extends('dashboard.dashboardLayout')

@section('mainDashboard')
<div class="main-content">
    <div class="header">
        <div class="header-left">
            <h5 class="mb-0"><i class="bi bi-people me-2"></i> Artists Management</h5>
        </div>
        <div class="header-right">
<a class="btn btn-primary btn-sm" href="{{ route("artist.create") }}"><i class="bi bi-plus-lg me-1"></i> Add Artist</a>
            {{-- <button class="btn btn-primary btn-sm" onclick="showError('Add artist functionality would be implemented')">
                <i class="bi bi-plus-lg me-1"></i> Add Artist
            </button> --}}
        </div>
    </div>
@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show">
    <i class="bi bi-exclamation-triangle me-2"></i>
    <span>Please fix the following errors:</span>
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
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
    <div class="container-fluid py-4">
        <!-- Error Alert Placeholder -->
        <div class="alert alert-danger alert-dismissible fade show d-none" id="errorAlert">
            <i class="bi bi-exclamation-triangle me-2"></i>
            <span id="errorMessage">Sample error message</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>

        <!-- Search and Filter Bar -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search artists..." id="searchInput">
                    <button class="btn btn-outline-secondary" type="button" onclick="showError('Search would be implemented')">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <select class="form-select" onchange="showError('Filter would be implemented')">
                    <option selected>All Specialties</option>
                    <option>Painting</option>
                    <option>Digital Art</option>
                    <option>Sculpture</option>
                </select>
            </div>
        </div>

        <!-- Artists Table -->
        <div class="card dashboard-card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table data-table">
                        <thead>
                            <tr>
                                <th width="80">Avatar</th>
                                <th>Artist</th>
                                <th>Specialty</th>
                                <th>Location</th>
                                <th>Social</th>
                                <th width="150" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample Artist 1 -->
                          @foreach ($artists as $artist)
                                <tr>
                                <td>
                                    <img src="{{ asset("storage/avatars/". $artist->user->avatar) }}" 
                                         class="rounded-circle" 
                                         width="50" 
                                         height="50" 
                                         alt="Artist">
                                </td>
                                <td>
                                    <strong>{{$artist->user->name}}</strong>
                                    <div class="text-muted small">{{$artist->user->email}}</div>
                                </td>
                                <td>{{$artist->specialty}}</td>
                                <td>{{$artist->location}}</td>
                                <td>
                            <div class="d-flex gap-2">
                               @if($artist->instagram)
                                    <a href="{{ $artist->instagram }}" class="text-dark" target="_blank" rel="noopener noreferrer">
                                       <i class="bi bi-instagram"></i>
                                     </a>
                                 @endif
        
        @if($artist->twitter)
            <a href="{{ $artist->twitter }}" class="text-dark" target="_blank" rel="noopener noreferrer">
                <i class="bi bi-twitter-x"></i>
            </a>
        @endif
        
        @if($artist->behance)
            <a href="{{ $artist->behance }}" class="text-dark" target="_blank" rel="noopener noreferrer">
                <i class="bi bi-behance"></i>
            </a>
        @endif
        
        @if($artist->dribbble)
            <a href="{{ $artist->dribbble }}" class="text-dark" target="_blank" rel="noopener noreferrer">
                <i class="bi bi-dribbble"></i>
            </a>
        @endif
        
        @if($artist->website)
            <a href="{{ $artist->website }}" class="text-dark" target="_blank" rel="noopener noreferrer">
                <i class="bi bi-globe"></i>
            </a>
        @endif
    </div>
</td>
                                <td class="text-end">
                                    <div class="btn-group btn-group-sm">

                                    <a class="btn btn-outline-primary" href="{{ route('artist.show', $artist->id) }}"> <i class="bi bi-eye"></i></a>
                                    <a class="btn btn-outline-success" href="{{ route("artist.edit",$artist->id) }}"><i class="bi bi-pencil"></i></a>
                                    <a class="btn btn-outline-danger" href="{{ route("artist.destroy",$artist->id) }}"><i class="bi bi-trash"></i></a>

                                        
                                        {{-- <button class="btn btn-outline-primary" onclick="showError('View artist')">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-outline-success" onclick="showError('Edit artist')">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-outline-danger" onclick="showError('Delete artist')">
                                            <i class="bi bi-trash"></i>
                                        </button> --}}
                                    </div>
                                </td>
                            </tr>
                          @endforeach

                            
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between mt-4">
                    <div class="text-muted small">Showing 1 to 2 of 2 entries</div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
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
    .dashboard-card {
        border-radius: 10px;
        box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.03);
    }
</style>
@endpush

@push('scripts')
<script>
    // Function to show error messages
    function showError(message) {
        document.getElementById('errorMessage').textContent = message;
        const alert = document.getElementById('errorAlert');
        alert.classList.remove('d-none');
        
        // Auto-hide after 5 seconds
        setTimeout(() => {
            alert.classList.add('d-none');
        }, 5000);
    }

    // Demo search functionality
    document.getElementById('searchInput').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            showError('Search functionality would be implemented in backend');
        }
    });
</script>
@endpush
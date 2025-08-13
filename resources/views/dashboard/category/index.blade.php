@extends('dashboard.dashboardLayout')

@section('mainDashboard')
<div class="main-content">
    <div class="header">
       
        <div class="header-left">
            <h5 class="mb-0"><i class="bi bi-collection me-2"></i> Categories</h5>
        </div>
            <!-- Success Message -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Error Message -->
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="header-right">
            <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg me-1"></i> Add Category
            </a>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="card dashboard-card">
            <div class="card-header d-flex justify-content-around align-items-center">
                <h5 class="mb-0">All Categories</h5>
                <div class="search-box">
                    <i class="bi bi-search"></i>
                    <input type="text" class="form-control form-control-sm" placeholder="Search categories...">
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table data-table">
                        <thead>
                            <tr>
                                <th width="50">#ID</th>
                                <th>Category Name</th>
                                <th width="150" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($categories as $category)
                                <tr>
                                <td>{{$category->id}}</td>
                                <td>
                                    <strong>{{$category->name}}</strong>
                                    {{-- <div class="text-muted small">Various painting techniques</div> --}}
                                </td>
                                <td class="text-end">
                                    <div class="btn-group btn-group-sm">
                                        <a href="#" class="btn btn-outline-primary" title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-outline-success" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="{{ route('category.delete', $category->id) }}" class="btn btn-outline-danger" title="Delete">
                                             <i class="bi bi-trash"></i>
                                        </a>
                                        {{-- <button class="btn btn-outline-danger" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button> --}}
                                    </div>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
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
    .data-table th {
        background-color: #f8f9fa;
    }
    .data-table tr:hover {
        background-color: rgba(108, 99, 255, 0.05);
    }
    .btn-group-sm > .btn {
        padding: 0.25rem 0.5rem;
    }
</style>

@endpush
@push('scripts')
<script>
    // Auto-dismiss alerts after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    });
</script>
@endpush
@extends('dashboard.dashboardLayout')

@section('mainDashboard')
<div class="main-content">
    <div class="header">
        <div class="header-left">
            <h5 class="mb-0">
                <a href="{{ route('category.index') }}" class="text-dark">
                    <i class="bi bi-arrow-left me-2"></i>
                </a>
                <i class="bi bi-collection me-2"></i> Create New Category
            </h5>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="card dashboard-card">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    
                    <!-- Name Field -->
                    <div class="mb-4">
                        <label for="name" class="form-label">Category Name <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}"
                               placeholder="e.g. Watercolor Painting" 
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Form Actions -->
                    <div class="d-flex justify-content-between pt-3 border-top">
                        <a href="{{ route('category.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-x-lg me-1"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-1"></i> Create Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    #createCategoryForm {
        max-width: 800px;
        margin: 0 auto;
    }
    .is-invalid {
        border-color: #dc3545;
    }
    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875em;
    }
</style>
@endpush
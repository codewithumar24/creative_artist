@extends('dashboard.dashboardLayout')

@section('mainDashboard')
<div class="main-content">
    <div class="header">
        <div class="header-left">
            <h5 class="mb-0">
                <a href="#" class="text-dark" onclick="showError('Back to list functionality would be implemented')">
                    <i class="bi bi-arrow-left me-2"></i>
                </a>
                <i class="bi bi-brush me-2"></i> Add New Artwork
            </h5>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="card dashboard-card">
            <div class="card-body">
                <!-- Error Alert Placeholder -->
                <div class="alert alert-danger alert-dismissible fade show d-none" id="formErrorAlert">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <span id="formErrorMessage">Sample error message would appear here</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <!-- Success Alert Placeholder -->
                <div class="alert alert-success alert-dismissible fade show d-none" id="formSuccessAlert">
                    <i class="bi bi-check-circle me-2"></i>
                    <span id="formSuccessMessage">Sample success message would appear here</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <form id="artworkForm" onsubmit="return validateForm()" method="POST" action="{{ route("artwork.store") }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Title Field -->
                    <div class="mb-4">
                        <label for="title" class="form-label">Artwork Title <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control" 
                               id="title" 
                               name="title" 
                               placeholder="e.g. Starry Night"
                               required>
                        <div class="invalid-feedback d-none" id="titleError">Please enter a valid title</div>
                    </div>

                    <!-- Description Field -->
                    <div class="mb-4">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" 
                                  id="description" 
                                  name="description" 
                                  rows="3"></textarea>
                        <div class="invalid-feedback d-none" id="descriptionError">Description is too long</div>
                    </div>

                    <!-- Medium Field -->
                    <div class="mb-4">
                        <label for="medium" class="form-label">Medium <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control" 
                               id="medium" 
                               name="medium" 
                               placeholder="e.g. Oil on canvas"
                               required>
                        <div class="invalid-feedback d-none" id="mediumError">Please specify the medium</div>
                    </div>

                    <!-- Artwork Image -->
                    <div class="mb-4">
                        <label for="image" class="form-label">Artwork Image <span class="text-danger">*</span></label>
                        <input type="file" 
                               class="form-control" 
                               id="image" 
                               name="image"
                               accept="image/*"
                               required>
                        <div class="invalid-feedback d-none" id="imageError">Please select an image file</div>
                    </div>

                    <!-- Artist Name -->
                    <div class="mb-4">
                        <label for="artist_name" class="form-label">Artist Name <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control" 
                               id="artist_name" 
                               name="artist_name" 
                               placeholder="e.g. Vincent van Gogh"
                               required>
                        <div class="invalid-feedback d-none" id="artistNameError">Please enter artist name</div>
                    </div>

                    <!-- Artist Image -->
                    <div class="mb-4">
                        <label for="artist_image" class="form-label">Artist Image (Optional)</label>
                        <input type="file" 
                               class="form-control" 
                               id="artist_image" 
                               name="artist_image"
                               accept="image/*">
                        <div class="invalid-feedback d-none" id="artistImageError">Invalid image format</div>
                    </div>

                    <!-- Category Selection -->
                    <div class="mb-4">
                        <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                        <select class="form-select" 
                                id="category_id" 
                                name="category_id"
                                required>
                                <option value="">Select a category</option>
                            @foreach ($categorys as $category)  
                            <option value="{{ $category->id }}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback d-none" id="categoryError">Please select a category</div>
                    </div>

                    <!-- Form Actions -->
                    <div class="d-flex justify-content-between pt-3 border-top">
                        <a href="#" class="btn btn-outline-secondary" onclick="showError('Cancel functionality would be implemented')">
                            <i class="bi bi-x-lg me-1"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-1"></i> Add Artwork
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
    .dashboard-card {
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

@push('scripts')
<script>
    // Demo form validation
    function validateForm() {
        let isValid = true;
        
        // Reset previous errors
        document.querySelectorAll('.is-invalid').forEach(el => {
            el.classList.remove('is-invalid');
        });
        document.querySelectorAll('.invalid-feedback').forEach(el => {
            el.classList.add('d-none');
        });
        
        // Simple validation example
        const title = document.getElementById('title');
        if (!title.value.trim()) {
            title.classList.add('is-invalid');
            document.getElementById('titleError').classList.remove('d-none');
            isValid = false;
        }
        
        const medium = document.getElementById('medium');
        if (!medium.value.trim()) {
            medium.classList.add('is-invalid');
            document.getElementById('mediumError').classList.remove('d-none');
            isValid = false;
        }
        
        const artistName = document.getElementById('artist_name');
        if (!artistName.value.trim()) {
            artistName.classList.add('is-invalid');
            document.getElementById('artistNameError').classList.remove('d-none');
            isValid = false;
        }
        
        const category = document.getElementById('category_id');
        if (!category.value) {
            category.classList.add('is-invalid');
            document.getElementById('categoryError').classList.remove('d-none');
            isValid = false;
        }
        
        const image = document.getElementById('image');
        if (!image.files.length) {
            image.classList.add('is-invalid');
            document.getElementById('imageError').classList.remove('d-none');
            isValid = false;
        }
        
        if (isValid) {
            showSuccess('Form validation passed! Backend would process this in real implementation.');
        } else {
            showError('Please fix the errors in the form');
        }
        
        return false; // Prevent actual form submission
    }
    
    function showError(message) {
        document.getElementById('formErrorMessage').textContent = message;
        document.getElementById('formErrorAlert').classList.remove('d-none');
        setTimeout(() => {
            document.getElementById('formErrorAlert').classList.add('d-none');
        }, 5000);
    }
    
    function showSuccess(message) {
        document.getElementById('formSuccessMessage').textContent = message;
        document.getElementById('formSuccessAlert').classList.remove('d-none');
        setTimeout(() => {
            document.getElementById('formSuccessAlert').classList.add('d-none');
        }, 5000);
    }
</script>
@endpush
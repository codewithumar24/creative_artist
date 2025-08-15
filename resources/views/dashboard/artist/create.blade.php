<!-- resources/views/dashboard/artists/create.blade.php -->
@extends('dashboard.dashboardLayout')

@section('mainDashboard')
<div class="main-content">
    <div class="header">
        <div class="header-left">
            <h5 class="mb-0">
                <a href="#" class="text-dark" onclick="history.back()">
                    <i class="bi bi-arrow-left me-2"></i>
                </a>
                <i class="bi bi-person-plus me-2"></i> Add New Artist
            </h5>
        </div>
    </div>

    <div class="container-fluid py-4">
        <!-- Error Message Placeholder -->
        <div class="alert alert-danger alert-dismissible fade show d-none" id="errorAlert">
            <i class="bi bi-exclamation-triangle me-2"></i>
            <span id="errorMessage">Sample error message would appear here</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="card dashboard-card">
            <div class="card-body">
               <form id="artistForm" method="POST" action="{{ route('artist.store')}}" enctype="multipart/form-data">
                     @csrf
                     <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" required>
                                <div class="invalid-feedback d-none" id="nameError">Please enter the artist's name</div>
                            </div>

                            <!-- Specialty -->
                            <div class="mb-3">
                                <label for="specialty" class="form-label">Primary Specialty <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="specialty" name="specialty" required>
                                <div class="invalid-feedback d-none" id="specialtyError">Please specify the artist's specialty</div>
                            </div>

                            <!-- Location -->
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location">
                            </div>

                            <!-- Bio -->
                            <div class="mb-3">
                                <label for="bio" class="form-label">Artist Bio</label>
                                <textarea class="form-control" id="bio" name="bio" rows="4"></textarea>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <!-- Avatar Upload -->
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Profile Image <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*" required>
                                <div class="invalid-feedback d-none" id="avatarError">Please upload a profile image</div>
                                <div class="form-text">Recommended size: 500x500 pixels</div>
                            </div>

                            <!-- Social Media Links -->
                            <div class="mb-3">
                                <label class="form-label">Social Media Links</label>
                                
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                    <input type="url" class="form-control" id="instagram" name="instagram" placeholder="Instagram URL">
                                </div>
                                
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="bi bi-twitter"></i></span>
                                    <input type="url" class="form-control" id="twitter" name="twitter" placeholder="Twitter URL">
                                </div>
                                
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="bi bi-behance"></i></span>
                                    <input type="url" class="form-control" id="behance" name="behance" placeholder="Behance URL">
                                </div>
                                
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="bi bi-dribbble"></i></span>
                                    <input type="url" class="form-control" id="dribbble" name="dribbble" placeholder="Dribbble URL">
                                </div>
                                
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-globe"></i></span>
                                    <input type="url" class="form-control" id="website" name="website" placeholder="Website URL">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="d-flex justify-content-between pt-3 border-top">
                        <button type="button" class="btn btn-outline-secondary" onclick="history.back()">
                            <i class="bi bi-x-lg me-1"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-1"></i> Save Artist
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
        max-width: 900px;
        margin: 0 auto;
        border-radius: 10px;
    }
    .input-group-text {
        width: 40px;
        justify-content: center;
    }
    .invalid-feedback {
        font-size: 0.85rem;
    }
    .form-text {
        font-size: 0.8rem;
        color: #6c757d;
    }
</style>
@endpush

@push('scripts')
<script>
    document.getElementById('artistForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Reset previous errors
    document.querySelectorAll('.is-invalid').forEach(el => {
        el.classList.remove('is-invalid');
    });
    document.querySelectorAll('.invalid-feedback').forEach(el => {
        el.classList.add('d-none');
    });

    // Client-side validation
    let isValid = true;
    const requiredFields = ['name', 'specialty', 'avatar'];
    
    requiredFields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        const errorElement = document.getElementById(fieldId + 'Error');
        
        if (field.type === 'file' ? !field.files.length : !field.value.trim()) {
            field.classList.add('is-invalid');
            errorElement.classList.remove('d-none');
            isValid = false;
        }
    });

    // Validate URLs if provided
    const urlFields = ['instagram', 'twitter', 'behance', 'dribbble', 'website'];
    urlFields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field.value.trim() && !isValidUrl(field.value)) {
            field.classList.add('is-invalid');
            isValid = false;
        }
    });

    if (isValid) {
        this.submit();
    } else {
        showError('Please fix the errors in the form');
    }
});

function isValidUrl(string) {
    try {
        new URL(string);
        return true;
    } catch (_) {
        return false;
    }
}
</script>
@endpush
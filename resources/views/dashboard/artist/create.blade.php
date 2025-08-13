<!-- resources/views/artists/index.blade.php -->
@extends('dashboard.dashboardLayout')

@section('mainDashboard')
<div id="artists-page">
    <section class="py-5">
        <div class="container py-5">
            <!-- Error Message Placeholder -->
            <div class="alert alert-danger alert-dismissible fade show d-none" id="errorAlert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <span id="errorMessage">Sample error message would appear here</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="section-title">Our Artists</h2>
                    <p class="lead">Discover and connect with talented artists from around the world.</p>
                </div>
            </div>
            
            <!-- Artist Create Form (Normally would be in separate view) -->
            <div class="row justify-content-center mb-5 d-none" id="artistFormContainer">
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Add New Artist</h4>
                            <form id="artistForm">
                                <div class="mb-3">
                                    <label for="artistName" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="artistName" required>
                                    <div class="invalid-feedback d-none" id="nameError">Please enter a name</div>
                                </div>
                                <div class="mb-3">
                                    <label for="artistSpecialty" class="form-label">Specialty <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="artistSpecialty" required>
                                    <div class="invalid-feedback d-none" id="specialtyError">Please enter a specialty</div>
                                </div>
                                <div class="mb-3">
                                    <label for="artistLocation" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="artistLocation">
                                </div>
                                <div class="mb-3">
                                    <label for="artistAvatar" class="form-label">Profile Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="artistAvatar" accept="image/*" required>
                                    <div class="invalid-feedback d-none" id="avatarError">Please select an image</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Social Links</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                        <input type="url" class="form-control" placeholder="Instagram">
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                        <input type="url" class="form-control" placeholder="Twitter">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fab fa-behance"></i></span>
                                        <input type="url" class="form-control" placeholder="Behance">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-outline-secondary me-2" onclick="hideForm()">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Add Artist</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Artist Button (For Demo) -->
            <div class="text-center mb-5">
                <button class="btn btn-success" onclick="showForm()">
                    <i class="fas fa-plus me-2"></i> Add New Artist
                </button>
            </div>
            
            <!-- Artist Cards -->
            <div class="row mt-5" id="artistContainer">
                <!-- Sample Artist 1 -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="artist-card">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Artist" class="artist-avatar">
                        <h4>Jessica Parker</h4>
                        <p class="text-muted">Oil Painter</p>
                        <p class="small">New York, USA</p>
                        <div class="artist-social">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                        </div>
                        <button class="btn btn-outline-primary mt-3" onclick="showError('View profile functionality would be implemented')">
                            View Portfolio
                        </button>
                    </div>
                </div>
                
                <!-- Sample Artist 2 -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="artist-card">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Artist" class="artist-avatar">
                        <h4>David Kim</h4>
                        <p class="text-muted">Digital Artist</p>
                        <p class="small">Seoul, South Korea</p>
                        <div class="artist-social">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-dribbble"></i></a>
                        </div>
                        <button class="btn btn-outline-primary mt-3" onclick="showError('View profile functionality would be implemented')">
                            View Portfolio
                        </button>
                    </div>
                </div>
                
                <!-- More sample artists... -->
            </div>
            
            <div class="text-center mt-4">
                <button class="btn btn-primary" id="load-more-artists" onclick="showError('Load more functionality would be implemented')">
                    Load More Artists
                </button>
            </div>
        </div>
    </section>
</div>
@endsection

@push('styles')
<style>
    .artist-card {
        background: white;
        border-radius: 10px;
        padding: 25px;
        text-align: center;
        height: 100%;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    .artist-card:hover {
        transform: translateY(-5px);
    }
    .artist-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 20px;
        border: 3px solid #6C63FF;
    }
    .artist-social {
        margin: 15px 0;
    }
    .artist-social a {
        color: #6c757d;
        font-size: 1.2rem;
        margin: 0 8px;
        transition: color 0.3s;
    }
    .artist-social a:hover {
        color: #6C63FF;
    }
    .section-title {
        font-weight: 700;
        color: #2F2E41;
        margin-bottom: 15px;
    }
</style>
@endpush

@push('scripts')
<script>
    // Demo functions for error/success handling
    function showError(message) {
        document.getElementById('errorMessage').textContent = message;
        document.getElementById('errorAlert').classList.remove('d-none');
        setTimeout(() => {
            document.getElementById('errorAlert').classList.add('d-none');
        }, 5000);
    }

    function showForm() {
        document.getElementById('artistFormContainer').classList.remove('d-none');
    }

    function hideForm() {
        document.getElementById('artistFormContainer').classList.add('d-none');
    }

    // Form validation demo
    document.getElementById('artistForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Simple validation
        let isValid = true;
        const name = document.getElementById('artistName');
        const specialty = document.getElementById('artistSpecialty');
        const avatar = document.getElementById('artistAvatar');
        
        if (!name.value.trim()) {
            document.getElementById('nameError').classList.remove('d-none');
            name.classList.add('is-invalid');
            isValid = false;
        }
        
        if (!specialty.value.trim()) {
            document.getElementById('specialtyError').classList.remove('d-none');
            specialty.classList.add('is-invalid');
            isValid = false;
        }
        
        if (!avatar.files.length) {
            document.getElementById('avatarError').classList.remove('d-none');
            avatar.classList.add('is-invalid');
            isValid = false;
        }
        
        if (isValid) {
            showError('Form would be submitted to backend in real implementation');
            hideForm();
        }
    });
</script>
@endpush
@extends('dashboard.dashboardLayout')

@section('mainDashboard')
<div class="main-content">
    <div class="header">
        <div class="header-left">
            <h5 class="mb-0">
                <a href="{{ route('artist.index') }}" class="text-dark">
                    <i class="bi bi-arrow-left me-2"></i>
                </a>
                <i class="bi bi-person-plus me-2"></i> Edit Artist
            </h5>
        </div>
    </div>

    <div class="container-fluid py-4">
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

        <div class="card dashboard-card">
            <div class="card-body">
                <form id="artistForm" method="POST" action="{{ route('artist.update', $artist->id) }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                          
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name', $artist->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="specialty" class="form-label">Primary Specialty <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('specialty') is-invalid @enderror" 
                                       id="specialty" name="specialty" value="{{ old('specialty', $artist->specialty) }}" required>
                                @error('specialty')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                       id="location" name="location" value="{{ old('location', $artist->location) }}">
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                          
                            <div class="mb-3">
                                <label for="bio" class="form-label">Artist Bio</label>
                                <textarea class="form-control @error('bio') is-invalid @enderror" 
                                          id="bio" name="bio" rows="4">{{ old('bio', $artist->bio) }}</textarea>
                                @error('bio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                           
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Profile Image</label>
                                <input type="file" class="form-control @error('avatar') is-invalid @enderror" 
                                       id="avatar" name="avatar" accept="image/*">
                                @error('avatar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Recommended size: 500x500 pixels</div>
                                
                                @if($artist->avatar)
                                <div class="mt-2">
                                    <small>Current Image:</small>
                                    <img src="{{ asset('storage/' . $artist->avatar) }}" 
                                         alt="Current avatar" 
                                         class="img-thumbnail mt-1" 
                                         style="max-height: 150px;">
                                </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Social Media Links</label>
                                
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                    <input type="url" class="form-control @error('instagram') is-invalid @enderror" 
                                           id="instagram" name="instagram" 
                                           placeholder="Instagram URL" 
                                           value="{{ old('instagram', $artist->instagram) }}">
                                    @error('instagram')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="bi bi-twitter"></i></span>
                                    <input type="url" class="form-control @error('twitter') is-invalid @enderror" 
                                           id="twitter" name="twitter" 
                                           placeholder="Twitter URL" 
                                           value="{{ old('twitter', $artist->twitter) }}">
                                    @error('twitter')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="bi bi-behance"></i></span>
                                    <input type="url" class="form-control @error('behance') is-invalid @enderror" 
                                           id="behance" name="behance" 
                                           placeholder="Behance URL" 
                                           value="{{ old('behance', $artist->behance) }}">
                                    @error('behance')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="bi bi-dribbble"></i></span>
                                    <input type="url" class="form-control @error('dribbble') is-invalid @enderror" 
                                           id="dribbble" name="dribbble" 
                                           placeholder="Dribbble URL" 
                                           value="{{ old('dribbble', $artist->dribbble) }}">
                                    @error('dribbble')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-globe"></i></span>
                                    <input type="url" class="form-control @error('website') is-invalid @enderror" 
                                           id="website" name="website" 
                                           placeholder="Website URL" 
                                           value="{{ old('website', $artist->website) }}">
                                    @error('website')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-3 border-top">
                        <a href="{{ route('artist.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-x-lg me-1"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-1"></i> Update Artist
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
        
        document.querySelectorAll('.is-invalid').forEach(el => {
            el.classList.remove('is-invalid');
        });
        document.querySelectorAll('.invalid-feedback').forEach(el => {
            el.classList.add('d-none');
        });

        
        let isValid = true;
        const requiredFields = ['name', 'specialty'];
        
        requiredFields.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            const errorElement = document.getElementById(fieldId + 'Error');
            
            if (!field.value.trim()) {
                field.classList.add('is-invalid');
                if (errorElement) errorElement.classList.remove('d-none');
                isValid = false;
            }
        });

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
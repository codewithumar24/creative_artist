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

            <!-- Search and Filter Bar -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search artists..." id="searchInput">
                        <button class="btn btn-outline-secondary" type="button" onclick="showError('Search functionality would be implemented in backend')">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <select class="form-select" onchange="showError('Filter functionality would be implemented in backend')">
                        <option selected>Filter by specialty</option>
                        <option>Painting</option>
                        <option>Digital Art</option>
                        <option>Sculpture</option>
                        <option>Photography</option>
                    </select>
                </div>
            </div>

            <!-- Artists Table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
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
                        <tr>
                            <td>
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" 
                                     class="rounded-circle" 
                                     width="60" 
                                     height="60" 
                                     alt="Jessica Parker">
                            </td>
                            <td>
                                <h6 class="mb-0">Jessica Parker</h6>
                                <small class="text-muted">Oil Painter</small>
                            </td>
                            <td>Painting</td>
                            <td>New York, USA</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="#" class="text-dark" onclick="showError('Instagram link would be implemented')"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="text-dark" onclick="showError('Twitter link would be implemented')"><i class="fab fa-twitter"></i></a>
                                </div>
                            </td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary" onclick="showError('View functionality would be implemented')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success" onclick="showError('Edit functionality would be implemented')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" onclick="showError('Delete functionality would be implemented')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Sample Artist 2 -->
                        <tr>
                            <td>
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" 
                                     class="rounded-circle" 
                                     width="60" 
                                     height="60" 
                                     alt="David Kim">
                            </td>
                            <td>
                                <h6 class="mb-0">David Kim</h6>
                                <small class="text-muted">Digital Artist</small>
                            </td>
                            <td>Digital Art</td>
                            <td>Seoul, South Korea</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="#" class="text-dark" onclick="showError('Instagram link would be implemented')"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="text-dark" onclick="showError('Dribbble link would be implemented')"><i class="fab fa-dribbble"></i></a>
                                </div>
                            </td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary" onclick="showError('View functionality would be implemented')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success" onclick="showError('Edit functionality would be implemented')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" onclick="showError('Delete functionality would be implemented')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Sample Artist 3 -->
                        <tr>
                            <td>
                                <img src="https://randomuser.me/api/portraits/women/65.jpg" 
                                     class="rounded-circle" 
                                     width="60" 
                                     height="60" 
                                     alt="Sophia Martinez">
                            </td>
                            <td>
                                <h6 class="mb-0">Sophia Martinez</h6>
                                <small class="text-muted">Watercolor Artist</small>
                            </td>
                            <td>Painting</td>
                            <td>Barcelona, Spain</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="#" class="text-dark" onclick="showError('Instagram link would be implemented')"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="text-dark" onclick="showError('Pinterest link would be implemented')"><i class="fab fa-pinterest"></i></a>
                                </div>
                            </td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary" onclick="showError('View functionality would be implemented')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success" onclick="showError('Edit functionality would be implemented')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" onclick="showError('Delete functionality would be implemented')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-between mt-4">
                <div>
                    <select class="form-select form-select-sm d-inline-block w-auto" onchange="showError('Pagination size would be implemented')">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                    </select>
                    <span class="ms-2 text-muted">items per page</span>
                </div>
                <nav aria-label="Page navigation">
                    <ul class="pagination">
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
    </section>
</div>
@endsection

@push('styles')
<style>
    #artists-page {
        background-color: #f8f9fa;
    }
    .section-title {
        font-weight: 700;
        color: #2F2E41;
        margin-bottom: 15px;
    }
    .table {
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0,0,0,0.05);
    }
    .table th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
        background-color: #f8f9fa !important;
    }
    .table td, .table th {
        vertical-align: middle;
        padding: 1rem;
    }
    .table tr:hover {
        background-color: rgba(108, 99, 255, 0.05);
    }
</style>
@endpush

@push('scripts')
<script>
    // Function to show error messages
    function showError(message) {
        document.getElementById('errorMessage').textContent = message;
        document.getElementById('errorAlert').classList.remove('d-none');
        setTimeout(() => {
            document.getElementById('errorAlert').classList.add('d-none');
        }, 5000);
    }

    // Demo function for search
    document.getElementById('searchInput').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            showError('Search would be implemented in backend');
        }
    });
</script>
@endpush
@extends("layouts.homeLayout")

@section("homeMain")
    <div id="artist-profile-page" class="pt-5">
        <section class="artist-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4 text-center">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Artist" class="artist-avatar-lg mb-4 mb-md-0">
                    </div>
                    <div class="col-md-8">
                        <h1>Jessica Parker</h1>
                        <p class="lead">Oil Painter | New York, USA</p>
                        <p>Specializing in vibrant oil paintings that capture the energy and diversity of urban life. My work explores themes of community, movement, and the interplay of light and shadow in city environments.</p>
                        <div class="artist-social mb-4">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                        </div>
                        <a href="#" class="btn btn-primary me-2">Contact Artist</a>
                        <a href="#" class="btn btn-outline-primary">Commission Work</a>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="py-5">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12">
                        <ul class="nav filter-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" data-filter="all">All Work</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-filter="painting">Paintings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-filter="sketch">Sketches</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-filter="commission">Commissions</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="artwork-card">
                            <div class="artwork-img-container" style="overflow: hidden;">
                                <img src="https://images.unsplash.com/flagged/photo-1572392640988-ba48d1a74457?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Abstract painting" class="artwork-img">
                            </div>
                            <div class="artwork-info">
                                <h4>City Rhythms</h4>
                                <p class="text-muted">Oil on canvas | 24" x 36"</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-primary fw-bold">$1,200</span>
                                    <span class="badge bg-primary">Available</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="artwork-card">
                            <div class="artwork-img-container" style="overflow: hidden;">
                                <img src="https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Abstract painting" class="artwork-img">
                            </div>
                            <div class="artwork-info">
                                <h4>Urban Dawn</h4>
                                <p class="text-muted">Oil on canvas | 18" x 24"</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-primary fw-bold">$850</span>
                                    <span class="badge bg-primary">Available</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="artwork-card">
                            <div class="artwork-img-container" style="overflow: hidden;">
                                <img src="https://images.unsplash.com/photo-1541961017774-22349e4a1262?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Abstract painting" class="artwork-img">
                            </div>
                            <div class="artwork-info">
                                <h4>Metropolis</h4>
                                <p class="text-muted">Oil on canvas | 30" x 40"</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-primary fw-bold">$2,400</span>
                                    <span class="badge bg-success">Sold</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="artwork-card">
                            <div class="artwork-img-container" style="overflow: hidden;">
                                <img src="{{ asset("images/main2.jpg") }}" alt="Abstract painting" class="artwork-img">
                            </div>
                            <div class="artwork-info">
                                <h4>Streetlight Serenade</h4>
                                <p class="text-muted">Oil on canvas | 20" x 24"</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-primary fw-bold">$950</span>
                                    <span class="badge bg-primary">Available</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="artwork-card">
                            <div class="artwork-img-container" style="overflow: hidden;">
                                <img src="https://images.unsplash.com/photo-1534447677768-be436bb09401?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Abstract painting" class="artwork-img">
                            </div>
                            <div class="artwork-info">
                                <h4>Night Moves</h4>
                                <p class="text-muted">Oil on canvas | 16" x 20"</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-primary fw-bold">$750</span>
                                    <span class="badge bg-success">Sold</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="artwork-card">
                            <div class="artwork-img-container" style="overflow: hidden;">
                                <img src="https://images.unsplash.com/photo-1516035069371-29a1b244cc32?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Abstract painting" class="artwork-img">
                            </div>
                            <div class="artwork-info">
                                <h4>Morning Commute</h4>
                                <p class="text-muted">Oil on canvas | 22" x 28"</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-primary fw-bold">$1,100</span>
                                    <span class="badge bg-primary">Available</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="py-5 bg-light">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="section-title">About The Artist</h2>
                    </div>
                </div>
                
                <div class="row mt-5">
                    <div class="col-lg-6">
                        <h3>Biography</h3>
                        <p>Jessica Parker is a New York-based oil painter whose vibrant works capture the energy and diversity of urban life. Born and raised in Brooklyn, Jessica developed an early fascination with the visual rhythms of the city, which continues to inspire her work today.</p>
                        <p>After studying fine arts at Pratt Institute, Jessica spent several years working as a graphic designer before returning to her first love - painting. Her work has been exhibited in galleries across the United States and is held in private collections worldwide.</p>
                        <p>When not in her studio, Jessica teaches painting workshops and mentors young artists through various community programs.</p>
                    </div>
                    <div class="col-lg-6">
                        <h3>Exhibitions & Awards</h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent">2022 - Solo Exhibition, "Urban Impressions", Chelsea Gallery, NY</li>
                            <li class="list-group-item bg-transparent">2021 - Emerging Artist Award, National Arts Foundation</li>
                            <li class="list-group-item bg-transparent">2020 - Group Show, Contemporary Art Fair, Miami</li>
                            <li class="list-group-item bg-transparent">2019 - Juror's Choice Award, Brooklyn Art Show</li>
                            <li class="list-group-item bg-transparent">2018 - Featured Artist, Art in the Park, Central Park</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
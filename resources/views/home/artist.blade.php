@extends("layouts.homeLayout")

@section("homeMain")
    <div id="artists-page">
        <section class="py-5">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="section-title">Our Artists</h2>
                        <p class="lead">Discover and connect with talented artists from around the world.</p>
                    </div>
                </div>
                
                <div class="row mt-5">
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
                            <a href="{{ route("home.profile") }}" class="btn btn-outline-primary mt-3">View Portfolio</a>
                        </div>
                    </div>
                    
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
                            <a href="{{ route("home.profile") }}" class="btn btn-outline-primary mt-3">View Portfolio</a>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="artist-card">
                            <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Artist" class="artist-avatar">
                            <h4>Sophia Martinez</h4>
                            <p class="text-muted">Watercolor Artist</p>
                            <p class="small">Barcelona, Spain</p>
                            <div class="artist-social">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                            </div>
                            <a href="{{ route("home.profile") }}" class="btn btn-outline-primary mt-3">View Portfolio</a>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="artist-card">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Artist" class="artist-avatar">
                            <h4>James Wilson</h4>
                            <p class="text-muted">Sculptor</p>
                            <p class="small">London, UK</p>
                            <div class="artist-social">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                            </div>
                            <a href="{{ route("home.profile") }}" class="btn btn-outline-primary mt-3">View Portfolio</a>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="artist-card">
                            <img src="https://randomuser.me/api/portraits/women/33.jpg" alt="Artist" class="artist-avatar">
                            <h4>Amanda Lee</h4>
                            <p class="text-muted">Mixed Media Artist</p>
                            <p class="small">Toronto, Canada</p>
                            <div class="artist-social">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                            </div>
                            <a href="{{ route("home.profile") }}" class="btn btn-outline-primary mt-3">View Portfolio</a>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="artist-card">
                            <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Artist" class="artist-avatar">
                            <h4>Carlos Mendez</h4>
                            <p class="text-muted">Digital Illustrator</p>
                            <p class="small">Mexico City, Mexico</p>
                            <div class="artist-social">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                            </div>
                            <a href="{{ route("home.profile") }}" class="btn btn-outline-primary mt-3">View Portfolio</a>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <button class="btn btn-primary" id="load-more-artists">Load More Artists</button>
                </div>
            </div>
        </section>
    </div>

@endsection
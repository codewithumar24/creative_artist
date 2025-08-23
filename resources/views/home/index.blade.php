@extends('layouts.homeLayout')

@section("homeMain")
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 hero-content">
                <h1 class="hero-title">Showcase Your Creative Passion</h1>
                <p class="hero-subtitle">Join our community of talented artists and share your work with the world. Get discovered, get inspired, and grow your artistic career.</p>
                <div class="hero-buttons d-flex flex-wrap">
                    <a href="{{ route("auth.register") }}" class="btn btn-primary me-3 mb-3">Join Now</a>
                    <a href="{{ route("home.gallery") }}" class="btn btn-outline-primary mb-3">Explore Artwork</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1547891654-e66ed7ebb968?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Artwork showcase" class="img-fluid hero-image rounded-3 shadow">
            </div>
        </div>
    </div>
</section>

{{-- Features Section --}}
<section class="py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="section-title">Why Choose CreativeHobbies</h2>
                <p class="lead">Our platform provides everything artists need to showcase their work and connect with art lovers worldwide.</p>
            </div>
        </div>

        <div class="row mt-5">

        
            <x-cart iconclass="fas fa-palette" paragraph="Create a stunning online portfolio that showcases your artwork in the best light with our customizable templates." heading="Beautiful Portfolio" />

            <x-cart iconclass="fas fa-users" paragraph="Connect with thousands of art enthusiasts, collectors, and fellow artists who appreciate your creative work." heading="Engaged Community" />

            <x-cart iconclass="fas fa-chart-line" paragraph="Access analytics, marketing tools, and resources to help you grow your audience and artistic career." heading="Growth Tools" />
        </div>
    </div>
</section>

{{-- Featured Artwork Section --}}
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="section-title">Featured Artwork</h2>
                <p class="lead">Discover inspiring artwork from our talented community members.</p>
            </div>
        </div>

      <div class="row mt-5">
    @foreach ($artworks as $artwork)
        <div class="col-md-6 col-lg-4 mb-4 animate-on-scroll">
            <div class="artwork-card">
                <div class="artwork-img-container">
                    <img src="{{ asset('storage/'.$artwork->image) }}" alt="{{ $artwork->title }}" class="artwork-img">
                </div>
                <div class="artwork-info">
                    <h4>{{ $artwork->title }}</h4>
                    <p class="text-muted">{{ $artwork->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="artist-profile.html" class="text-decoration-none artist-link">
                            <div class="d-flex align-items-center">
                                <div class="artist-avatar-container">
                                    <img src="{{ $artwork->user && $artwork->user->avatar 
                                              ? asset('storage/' . $artwork->user->avatar) 
                                              : asset('images/default-avatar.png') }}"
                                         alt="{{ $artwork->artist_name }}" 
                                         class="artist-avatar">
                                </div>
                                <span class="artist-name">{{ $artwork->artist_name }}</span>
                            </div>
                        </a>
                        <span class="badge bg-primary">{{ $artwork->category->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

        <div class="text-center mt-4">
            <a href="{{ route("home.gallery") }}" class="btn btn-primary">View All Artwork</a>
        </div>
    </div>
</section>

{{-- Featured Artists Section --}}
<section class="py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="section-title">Featured Artists</h2>
                <p class="lead">Meet some of the talented artists in our community.</p>
            </div>
        </div>

        <div class="row mt-5">
           @foreach ($artists as $artist)
                      <div class="col-md-6 col-lg-4 mb-4">
                      <div class="artist-card">
                       <img src="{{ $artist->user && $artist->user->avatar 
                                              ? asset('storage/' . $artist->user->avatar) 
                                              : asset('images/default-avatar.png') }}"
                                         alt="{{ $artist->artist_name }}" 
                     class="artist-imag">
                <h4>{{ $artist->name }}</h4>
                <p class="text-muted">{{ $artist->specialty }}</p>
                <p class="small">{{ $artist->location }}</p>
                <div class="artist-social">
                    @if($artist->instagram)
                        <a href="{{ $artist->instagram }}" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-instagram"></i>
                        </a>
                    @endif
                    
                    @if($artist->twitter)
                        <a href="{{ $artist->twitter }}" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-twitter"></i>
                        </a>
                    @endif
                    
                    @if($artist->behance)
                        <a href="{{ $artist->behance }}" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-behance"></i>
                        </a>
                    @endif
                    
                    @if($artist->dribbble)
                        <a href="{{ $artist->dribbble }}" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-dribbble"></i>
                        </a>
                    @endif
                    
                    @if($artist->website)
                        <a href="{{ $artist->website }}" target="_blank" rel="noopener noreferrer">
                            <i class="fas fa-globe"></i>
                        </a>
                    @endif
                </div>
                <a href="{{ route('artist.show', $artist->id) }}" class="btn btn-outline-primary mt-3">
                    View Portfolio
                </a>
            </div>
        </div>
    @endforeach

            {{-- <div class="col-md-6 col-lg-3 mb-4 animate-on-scroll">
                <div class="artist-card">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Artist" class="artist-avatar">
                    <h4>David Kim</h4>
                    <p class="text-muted">Digital Artist</p>
                    <div class="artist-social">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-dribbble"></i></a>
                    </div>
                    <a href="artist-profile.html" class="btn btn-outline-primary mt-3">View Portfolio</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-4 animate-on-scroll">
                <div class="artist-card">
                    <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Artist" class="artist-avatar">
                    <h4>Sophia Martinez</h4>
                    <p class="text-muted">Watercolor Artist</p>
                    <div class="artist-social">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-pinterest"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                    </div>
                    <a href="artist-profile.html" class="btn btn-outline-primary mt-3">View Portfolio</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-4 animate-on-scroll">
                <div class="artist-card">
                    <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Artist" class="artist-avatar">
                    <h4>James Wilson</h4>
                    <p class="text-muted">Sculptor</p>
                    <div class="artist-social">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                    <a href="artist-profile.html" class="btn btn-outline-primary mt-3">View Portfolio</a>
                </div>
            </div> --}}
        </div>

        <div class="text-center mt-4">
            <a href="{{ route("home.artist") }}" class="btn btn-primary">Discover More Artists</a>
        </div>
    </div>
</section>

{{-- Testimonials Section --}}
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="section-title">What Our Artists Say</h2>
                <p class="lead">Hear from artists who have grown their audience with CreativeHobbies.</p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-10 mx-auto">
                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="testimonial-card">
                                <p class="testimonial-text">"CreativeHobbies has completely transformed how I share my work. I've connected with collectors and fellow artists from around the world, and my sales have increased significantly since joining."</p>
                                <div class="d-flex align-items-center">
                                    <img src="https://randomuser.me/api/portraits/women/33.jpg" alt="Testimonial" class="rounded-circle me-3" width="60">
                                    <div>
                                        <h5 class="testimonial-author mb-0">Amanda Lee</h5>
                                        <p class="testimonial-role mb-0">Mixed Media Artist</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="testimonial-card">
                                <p class="testimonial-text">"As a digital artist, having a professional portfolio was crucial for my career. CreativeHobbies made it easy to showcase my work beautifully and attract new clients."</p>
                                <div class="d-flex align-items-center">
                                    <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Testimonial" class="rounded-circle me-3" width="60">
                                    <div>
                                        <h5 class="testimonial-author mb-0">Carlos Mendez</h5>
                                        <p class="testimonial-role mb-0">Digital Illustrator</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="testimonial-card">
                                <p class="testimonial-text">"The community on CreativeHobbies is incredibly supportive. I've received valuable feedback on my work and made connections that have led to exciting collaborations."</p>
                                <div class="d-flex align-items-center">
                                    <img src="https://randomuser.me/api/portraits/women/51.jpg" alt="Testimonial" class="rounded-circle me-3" width="60">
                                    <div>
                                        <h5 class="testimonial-author mb-0">Priya Patel</h5>
                                        <p class="testimonial-role mb-0">Watercolor Artist</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Call to Action Section --}}
<section class="py-5 mb-5" style="background-color: var(--primary-color); color: white;">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2 class="mb-3">Ready to Showcase Your Artwork?</h2>
                <p class="lead mb-0">Join thousands of artists who are building their online presence with CreativeHobbies.</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                <a href="{{ route("auth.register") }}" class="btn btn-light btn-lg">Get Started Now</a>
            </div>
        </div>
    </div>
</section>
@endsection







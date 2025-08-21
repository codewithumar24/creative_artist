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
                   @foreach ($artists as $artist)
                      <div class="col-md-6 col-lg-4 mb-4">
                      <div class="artist-card">
                       <img src="{{ $artist->user && $artist->user->avatar 
                                              ? asset('storage/avatars/' . $artist->user->avatar) 
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
                </div>
                
                <div class="text-center mt-4">
                    <button class="btn btn-primary" id="load-more-artists">Load More Artists</button>
                </div>
            </div>
        </section>
    </div>

@endsection
@extends("layouts.homeLayout")

@section("homeMain")
    <div id="gallery-page">
        <section class="py-5 bg-light">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="section-title">Artwork Gallery</h2>
                        <p class="lead">Browse and discover amazing artwork from our community.</p>
                    </div>
                </div>
                
                <div class="row mt-5">
                    <div class="col-12">
                        <ul class="nav filter-nav justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" data-filter="all">All</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-filter="painting">Painting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-filter="digital">Digital Art</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-filter="photography">Photography</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-filter="sculpture">Sculpture</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-filter="illustration">Illustration</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="row mt-4 gallery-items">
                    <!-- Artwork items will be loaded here -->
                    @foreach ($artworks as $artwork)
                        <div class="col-md-6 col-lg-4 mb-4 gallery-item" data-category="painting">
                        <div class="artwork-card">
                            <div class="artwork-img-container" style="overflow: hidden;">
                                <img src="{{ asset('storage/'. $artwork->image) }}" alt="Abstract painting" class="artwork-img">
                            </div>
                            <div class="artwork-info">
                                <h4>{{$artwork->title}}</h4>
                                <p class="text-muted">{{$artwork->description}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="artist-profile.html" class="text-decoration-none">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/'.$artwork->artist_image) }}" alt="Artist" class="rounded-circle me-2" width="30">
                                            <span>{{$artwork->artist_name}}</span>
                                        </div>
                                    </a>
                                    <span class="badge bg-primary">{{$artwork->category->name}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="text-center mt-4">
                    <button class="btn btn-primary" id="load-more">Load More</button>
                </div>
            </div>
        </section>
    </div>
@endsection
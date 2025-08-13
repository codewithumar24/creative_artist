@extends("layouts.homeLayout")

@section("homeMain")
    <div id="about-page">
        <section class="py-5">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h2 class="section-title">Our Story</h2>
                        <p class="lead">Connecting artists with art lovers since 2015.</p>
                        <p>CreativeHobbies was founded by a group of artists who saw the need for a better way to showcase creative work online. We wanted to create a platform that was both beautiful to look at and easy to use, where artists could focus on their craft while we handled the technical details.</p>
                        <p>Today, CreativeHobbies is home to thousands of artists from around the world, working in every medium imaginable. Our mission is to empower artists to share their work, grow their audience, and make a living doing what they love.</p>
                        <a href="contact.html" class="btn btn-primary mt-3">Get In Touch</a>
                    </div>
                    <div class="col-lg-6 mt-5 mt-lg-0">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Our team" class="img-fluid rounded shadow">
                    </div>
                </div>
                
                <div class="row mt-5">
                    <div class="col-12 text-center">
                        <h2 class="section-title">Our Team</h2>
                        <p class="lead">The passionate people behind CreativeHobbies</p>
                    </div>
                </div>
                
                <div class="row mt-5">
                    <div class="col-md-4 mb-4">
                        <div class="artist-card">
                            <img src="https://randomuser.me/api/portraits/women/63.jpg" alt="Team member" class="artist-avatar">
                            <h4>Emily Chen</h4>
                            <p class="text-muted">Founder & CEO</p>
                            <p class="small">Emily is an artist and entrepreneur with a vision for connecting creatives worldwide.</p>
                            <div class="artist-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-4">
                        <div class="artist-card">
                            <img src="https://randomuser.me/api/portraits/men/41.jpg" alt="Team member" class="artist-avatar">
                            <h4>Michael Johnson</h4>
                            <p class="text-muted">CTO</p>
                            <p class="small">Michael leads our technical team, ensuring the platform runs smoothly for all users.</p>
                            <div class="artist-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-4">
                        <div class="artist-card">
                            <img src="https://randomuser.me/api/portraits/women/28.jpg" alt="Team member" class="artist-avatar">
                            <h4>Sarah Williams</h4>
                            <p class="text-muted">Community Manager</p>
                            <p class="small">Sarah builds and nurtures our artist community, organizing events and features.</p>
                            <div class="artist-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
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
                        <h2 class="section-title">Our Values</h2>
                        <p class="lead">What we stand for and believe in</p>
                    </div>
                </div>
                
                <div class="row mt-5">
                    <div class="col-md-4 mb-4">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-paint-brush"></i>
                            </div>
                            <h3>Creativity First</h3>
                            <p>We believe in putting artists and their creative vision at the center of everything we do.</p>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-4">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <h3>Community Focus</h3>
                            <p>We're building more than a platform - we're building a supportive creative community.</p>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-4">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <h3>Artist Ownership</h3>
                            <p>Artists retain full rights to their work. We're just here to help share it with the world.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
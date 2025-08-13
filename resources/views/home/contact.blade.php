@extends("layouts.homeLayout")

@section("homeMain")
    <div id="contact-page">
        <section class="py-5">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="section-title">Get In Touch</h2>
                        <p class="lead">We'd love to hear from you! Contact us with questions, feedback, or partnership inquiries.</p>
                    </div>
                </div>
                
                <div class="row mt-5">
                    <div class="col-lg-6">
                        <form id="contact-form">
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                    <div class="col-lg-6 mt-5 mt-lg-0">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="contact-info-card">
                                    <div class="contact-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <h4>Our Location</h4>
                                    <p>123 Art Street, Creative District<br>San Francisco, CA 94110</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="contact-info-card">
                                    <div class="contact-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <h4>Email Us</h4>
                                    <p>info@creativehobbies.com<br>support@creativehobbies.com</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="contact-info-card">
                                    <div class="contact-icon">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <h4>Call Us</h4>
                                    <p>+1 (555) 123-4567<br>Mon-Fri, 9am-5pm PST</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="contact-info-card">
                                    <div class="contact-icon">
                                        <i class="fas fa-comments"></i>
                                    </div>
                                    <h4>Live Chat</h4>
                                    <p>Available 24/7<br>Click the chat icon below</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <div class="container-fluid px-0">
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.788893085085!2d-122.4199066846822!3d37.77492997975938!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan%20Francisco%2C%20CA!5e0!3m2!1sen!2sus!4v1620000000000!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
@endsection
  {{-- Footer  --}}
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h3 class="footer-title">CreativeHobbies</h3>
                    <p class="mt-3">The premier platform for artists to showcase their work, connect with art lovers, and grow their creative careers.</p>
                    <div class="social-icons mt-4">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-pinterest"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-5 mb-md-0">
                    <h4 class="footer-title">Quick Links</h4>
                    <div class="footer-links mt-4">
                        <a href="/">Home</a>
                        <a href="{{ route("home.gallery") }}">Gallery</a>
                        <a href="{{ route("home.artist") }}">Artists</a>
                        <a href="{{ route("home.about") }}">About Us</a>
                        <a href="{{ route("home.contact") }}">Contact</a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-5 mb-md-0">
                    <h4 class="footer-title">For Artists</h4>
                    <div class="footer-links mt-4">
                        <a href="{{ route("auth.register") }}">Join Now</a>
                        <a href="{{ route("login") }}">Login</a>
                        <a href="#">Pricing</a>
                        <a href="#">Help Center</a>
                        <a href="#">Sell Artwork</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h4 class="footer-title">Newsletter</h4>
                    <p class="mt-4">Subscribe to get updates on new artwork, featured artists, and special offers.</p>
                    <form class="mt-4">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Your email" required>
                            <button class="btn btn-light" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center copyright">
                    <p class="mb-0">&copy; 2023 CreativeHobbies. All rights reserved. | <a href="#" class="text-white">Privacy Policy</a> | <a href="#" class="text-white">Terms of Service</a></p>
                </div>
            </div>
        </div>
    </footer>
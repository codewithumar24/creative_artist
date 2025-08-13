<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img class="main-logo" src="{{ asset('images/logo.png') }}" alt="CreativeHobbies Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.gallery') }}">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.artist') }}">Artists</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-primary" href="{{ route('auth.register') }}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Logo styling */
    .navbar-brand {
        padding-top: 0.3125rem;
        padding-bottom: 0.3125rem;
        margin-right: 1rem;
        display: flex;
        align-items: center;
    }
    
    .main-logo {
        height: 40px; 
        width: auto; 
        max-height: 100%; 
        transition: all 0.3s ease; 
    }
    
    .navbar.scrolled .main-logo {
        height: 30px;
    }
    
    .navbar-toggler {
        margin-left: auto;
    }
    
    @media (max-width: 992px) {
        .main-logo {
            height: 35px;
        }
    }
    
    @media (max-width: 768px) {
        .main-logo {
            height: 30px; 
        }
    }
</style>

<script>
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        }
    });
</script>
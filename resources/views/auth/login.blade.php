@extends("layouts.homeLayout")

@section("homeMain")
    <div id="login-page">
        <section class="py-5">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="auth-card">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <h2 class="auth-title">Login to Your Account</h2>
                            <form id="login-form" method="POST" action="{{ route("auth.loginStore") }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="login-email" class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="login-email" required>
                                     @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="login-password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="login-password" required>
                                     @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="remember-me">
                                    <label class="form-check-label" for="remember-me">Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Login</button>
                                <div class="text-center mt-3">
                                    <a href="#">Forgot password?</a>
                                </div>
                                <div class="text-center mt-4">
                                    <p>Don't have an account? <a href="{{ route("auth.register") }}">Sign up</a></p>
                                </div>
                                <div class="divider my-4 text-center">OR</div>
                               <a class="btn btn-outline-secondary w-100 mb-2" href="{{ route("google.login") }}"><i class="fab fa-google me-2"></i> Continue with Google</a>

                                {{-- <button type="button" class="btn btn-outline-secondary w-100 mb-2">
                                    <i class="fab fa-google me-2"></i> Continue with Google
                                </button> --}}
                                <button type="button" class="btn btn-outline-secondary w-100">
                                    <i class="fab fa-facebook-f me-2"></i> Continue with Facebook
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
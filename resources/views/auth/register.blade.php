@extends("layouts.homeLayout")

@section("homeMain")
<div id="register-page">
    <section class="py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="auth-card">
                        <h2 class="auth-title">Create Your Account</h2>
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="register-form" method="POST" action="{{ route('auth.signUp') }}">
                            @csrf
                            <div class="row">
                                <div class="mb-3">
                                    <label for="first-name" class="form-label">Name</label>
                                    <input type="text" name="name" {{ old('name') }} class="form-control @error('firstName') is-invalid @enderror" id="first-name" value="{{ old('firstName') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="register-email" class="form-label">Email Address</label>
                                <input type="email" {{ old('email') }} name="email" class="form-control @error('email') is-invalid @enderror" id="register-email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="register-password" class="form-label">Password</label>
                                <input type="password" {{ old('passord') }} name="password" class="form-control @error('password') is-invalid @enderror" id="register-password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirm-password" class="form-label">Confirm Password</label>
                                <input type="password" {{ old('password_confirmation') }} name="password_confirmation" class="form-control" id="confirm-password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Create Account</button>
                            <div class="text-center mt-4">
                                <p>Already have an account? <a href="{{ route("login") }}">Log in</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection